<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // Отображение главной страницы
    public function index()
    {
        // Получение отзывов с пагинацией, 3 отзыва на страницу
        $reviews = Review::paginate(3);
        // Возвращение представления 'home', передача данных об отзывах в представление
        return view('home', compact('reviews'));
    }

    // Отображение блога
    public function blog()
    {
        // Возвращение представления 'blog'
        return view('blog');
    }
}
