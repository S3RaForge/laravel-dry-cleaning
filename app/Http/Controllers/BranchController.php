<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchPhone;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    // Получить список отделений с пагинацией и отобразить вид списка отделений
    public function index() {
        // Получить отделения с пагинацией, 3 на страницу
        $branches = Branch::paginate(3);
        // Вернуть вид 'branch.index', передав в него данные об отделениях
        return view('branch.index', compact('branches'));
    }

    // Отобразить вид конкретного отделения
    public function branchById(Branch $branch) {
        // Вернуть вид 'branch.branch', передав в него данные о конкретном отделении
        return view('branch.branch', compact('branch'));
    }

    // Отобразить форму создания нового отделения
    public function create(){
        // Очистить сообщение сессии, если существует
        if(session()->has('message')){
            session()->forget('message');
        }
        // Вернуть вид 'branch.create' для создания нового отделения
        return view('branch.create');
    }

    // Создать новое отделение и связанные с ним номера телефонов
    public function store(Request $request){
        // Проверить входящие данные на валидность
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'openTime' => 'required',
            'closeTime' => 'required',
        ]);
        // Создать новое отделение с предоставленными данными
        $branch = Branch::create($request->all());
        $phones = $request->phone;
        // Создать связанные номера телефонов для отделения
        foreach ($phones as $phone) {
            $branchPhone = BranchPhone::create([
                'phone' => $phone,
                'branch_id' => $branch->id,
            ]);
            $branchPhone->save();
        }
        // Установить сообщение сессии, указывающее на успешное создание отделения
        $request->session()->put('message', 'Branch created');
        // Вернуть вид 'branch.create'
        return view('branch.create');
    }

    // Удалить отделение
    public function delete(Branch $branch)
    {
        // Удалить указанное отделение
        $branch->delete();
        // Перенаправить на список отделений
        return redirect()->route('branch.index');
    }

    // Отобразить форму редактирования существующего отделения
    public function edit(Branch $branch) {
        // Очистить сообщение сессии, если существует
        if(session()->has('message')){
            session()->forget('message');
        }
        // Вернуть вид 'branch.edit', передав данные об отделении
        return view('branch.edit', compact('branch'));
    }

    // Обновить существующее отделение и связанные с ним номера телефонов
    public function update(Request $request, Branch $branch) {
        // Проверить входящие данные на валидность
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'openTime' => 'required',
            'closeTime' => 'required',
        ]);
        // Обновить отделение с предоставленными данными
        $branch->update($request->all());
        $phones = $request->phone;
        // Создать или обновить связанные номера телефонов для отделения
        foreach ($phones as $phone) {
            $branchPhone = BranchPhone::create([
                'phone' => $phone,
                'branch_id' => $branch->id,
            ]);
            $branchPhone->save();
        }
        // Перенаправить на список отделений после успешного обновления
        return redirect()->route('branch.index');
    }
}