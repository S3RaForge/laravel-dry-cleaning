<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Отображение списка услуг с пагинацией
    public function index() {
        $services = Service::paginate(5);
        return view('service.index', compact('services'));
    }

    // Отображение страницы услуги с отзывами
    public function serviceById(Service $service) {
        // Получение отзывов для данной услуги с пагинацией
        $reviews = Review::paginate(3);
        return view('service.service', compact('service', 'reviews'));
    }

    // Отображение формы создания новой услуги
    public function create(){
        // Очистка сообщения сессии, если оно существует
        if(session()->has('message')){
            session()->forget('message');
        }
        return view('service.create');
    }

    // Сохранение новой услуги
    public function store(Request $request){
        // Проверка входящих данных на валидность
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        // Создание новой услуги с предоставленными данными
        Service::create($request->all());
        
        // Установка сообщения сессии о создании услуги
        $request->session()->put('message', 'Service been created');
        return view('service.create');
    }

    // Удаление услуги
    public function delete(Service $service)
    {
        // Удаление указанной услуги
        $service->delete();
        // Перенаправление на список услуг
        return redirect()->route('service.index');
    }

    // Отображение формы редактирования услуги
    public function edit(Service $service) {
        // Очистка сообщения сессии, если оно существует
        if(session()->has('message')){
            session()->forget('message');
        }
        return view('service.edit', compact('service'));
    }
    
    // Обновление информации о услуге
    public function update(Request $request, Service $service) {
        // Проверка входящих данных на валидность
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        // Обновление данных о услуге
        $service->update($request->all());
        // Перенаправление на список услуг после обновления
        return redirect()->route('service.index');
    }
}