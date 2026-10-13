<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Ресурсные маршруты для статей (создают /articles, /articles/create, /articles/{article} и т.д.)
Route::resource('articles', ArticleController::class);

Route::get('/', [MainController::class, 'index']);
Route::get('/galery/{full_image}', [MainController::class, 'show']);

// Удалили конфликтный Route::get('articles/show', ...)

// Регистрация
Route::get('/signup', [AuthController::class, 'create']);
Route::post('/signup', [AuthController::class, 'signup']);

// Вход
Route::get('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/login', [AuthController::class, 'signin']);

Route::get('/about', function () {
    return view('main.about');
});

Route::get('/contact', function () {
    $contact = [
        'name' => 'Polytech',
        'adres' => 'B.Semenovskay',
        'phone' => '8(495) 423-2323',
        'email' => '@mospolytech.ru',
        'student' => 'Goncharyuk Vadim',
        'group' => '251-3210',
    ];

    return view('main.contact', ['contact' => $contact]);
});