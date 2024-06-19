<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewControllerr extends Controller
{
    // Отображение списка отзывов
    public function index() {
        // Получение отзывов, отсортированных по дате обновления по убыванию, с пагинацией по 10 на страницу
        $reviews = Review::orderBy('updated_at', 'desc')->paginate(10);
        // Возвращение представления 'review.index', передача отзывов в представление
        return view('review.index', compact('reviews'));
    }

    // Отображение формы создания отзыва
    public function create() {
        // Очистка сообщения сессии, если оно существует
        if(session()->has('message')){
            session()->forget('message');
        }
        // Возвращение представления 'review.create'
        return view('review.create');
    }

    // Сохранение нового отзыва
    public function store(Request $request) {
        // Проверка входящих данных на валидность
        $request->validate([
            'guestName' => 'required|max:30',
            'rating' => 'required|in:1,2,3,4,5',
            'text' => 'max:500'
        ]);
        // Создание нового отзыва с предоставленными данными
        Review::create($request->all());

        // Установка сообщения сессии
        $request->session()->put('message', 'Thank you for your feedback, we try to read them from time to time to improve our work');
        // Возвращение представления 'review.create'
        return view('review.create');
    }

    // Удаление отзыва
    public function delete(Review $review){
        // Удаление указанного отзыва
        $review->delete();
        // Перенаправление на список отзывов
        return redirect()->route('review.index');
    }
}
