<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Отобразить страницу контактов
    public function index()
    {
        // Очистить сообщение сессии, если существует
        if(session()->has('message')){
            session()->forget('message');
        }
        // Вернуть вид 'contact.index'
        return view('contact.index');
    }

    // Отправить сообщение
    public function send(Request $request) 
    {
        // Проверить входящие данные на валидность
        $request->validate([
            'name' => 'required|max:30',
            'message' => 'required|max:70'
        ]);
        // Отправить сообщение на указанный электронный адрес
        mail('yourmail@mail.com', "Message from {$request->name}", $request->message);
        // Установить сообщение сессии
        $request->session()->put('message', 'Thanks for your message!');
        // Вернуть вид 'contact.index'
        return view('contact.index');
    }
}