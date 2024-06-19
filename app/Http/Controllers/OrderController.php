<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Отображение страницы заказов
    public function index(){
        return view('order.index');
    }

    // Отображение формы создания заказа
    public function create(){
        // Очистка сообщения сессии, если оно существует, и очистка уникального идентификатора
        if(session()->has('message')){
            session()->forget('message');
            session()->forget('uniqid');
        }
        // Получение всех услуг и передача их в представление
        $services = Service::all()->pluck('name', 'id');
        return view('order.create', compact('services'));
    }

    // Сохранение нового заказа
    public function store(Request $request)
    {
        // Проверка входящих данных на валидность
        $request->validate([
            'clientName' => 'required',
            'clientPhone' => 'required',
            'clientAddress' => 'required',
            'clientEmail' => 'required',
        ]);

        // Отправка сообщения с уникальным идентификатором на указанный адрес электронной почты клиента
        $uniqid = $request->uniqid;
        mail("{$request->clientEmail}", "Your code:", $request->uniqid);
        
        // Создание нового заказа с предоставленными данными
        $order = Order::create($request->all());
        // Связывание выбранных услуг с заказом
        $order->services()->sync($request->services);

        // Установка сообщения сессии и уникального идентификатора
        $request->session()->put('message', 'Your order is being processed, we will call you if anything goes wrong');
        $request->session()->put('uniqid', $uniqid);
        return view('order.create');
    }

    // Отображение страницы поиска заказа
    public function find() {
        return view('order.find');
    }

    // Получение заказа по уникальному идентификатору
    public function getByUniqid(Request $request) {
        // Очистка сообщения сессии и уникального идентификатора, если они существуют
        if(session()->has('message')){
            session()->forget('message');
            session()->forget('uniqid');
        }
        // Поиск заказа по уникальному идентификатору и передача его в представление
        $request->validate([
            'uniqid' => 'required',
        ]);
        $order = Order::where('uniqid', '=', $request->uniqid)->first();
        return view('order.order', compact('order'));
    }

    // Отображение страницы управления заказами
    public function managment() {
        // Получение всех заказов с пагинацией и передача их в представление
        $orders = Order::paginate(1);
        return view('order.managment', compact('orders'));
    } 

    // Удаление заказа
    public function delete(Order $order)
    {
        $order->delete();
        return redirect()->route('order.managment');
    }
    
    // Обновление состояния заказа
    public function update(Request $request, Order $order) {
        $order->orderState = $request->orderState;        
        $order->save();
        return redirect()->route('order.managment');
    }
}
