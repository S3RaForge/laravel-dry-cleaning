<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Отображение списка пользователей
    public function index(){
        // Получение списка пользователей с использованием пагинации (по 8 пользователей на страницу)
        $users = User::paginate(8);
        // Возвращение представления 'user.index' с передачей списка пользователей
        return view('user.index', compact('users'));
    }
    
    // Удаление пользователя
    public function delete(User $user)
    {
        // Удаление указанного пользователя из базы данных
        $user->delete();
        // Перенаправление на страницу списка пользователей
        return redirect()->route('user.index');
    }

    // Обновление роли пользователя
    public function update(User $user) {
        // Переключение роли пользователя между 'admin' и null (если у пользователя нет роли, устанавливаем 'admin', иначе удаляем роль)
        if($user->role == null){
            $user->role = 'admin';
        }
        else{
            $user->role = null;
        }
        // Сохранение обновленной роли пользователя в базе данных
        $user->update();
        // Перенаправление на страницу списка пользователей
        return redirect()->route('user.index');
    }
}