<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('register', [MainController::class, 'register'])->name('register');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/categories', [DashboardController::class, 'categories'])->name('categories');
Route::get('dashboard/categories/create', [DashboardController::class, 'categories_create'])->name('categories_create');
Route::post('dashboard/categories/create', [DashboardController::class, 'categories_store'])->name('categories-create');

Route::get('logout', function () {
    Auth::logout();
    return redirect()->intended('/');
})->name('logout');


Route::post('login',  [MainController::class, 'login'])->name('login');

Route::get('login', function () {
    if (Auth::check()) {
        return redirect()->intended('dashboard');
    }
    return view('login');
})->name('login');


Route::get('about-us', [MainController::class, 'about_us'])->name('about');
Route::get('contact-us', [MainController::class, 'contact_us'])->name('contact');
Route::get('model-saving', [MainController::class, 'model_saving'])->name('model-saving');
Route::get('model-querying', [MainController::class, 'model_querying'])->name('model-querying');
Route::get('model-relationships', [MainController::class, 'model_relationships'])->name('model-relationships');

/* Route::get('about-us', function () {
    return route('contact');
})->name('about'); */



/* Route::get('news-details/{id}', function ($id) {
    return 'news-details for post => ' . $id;
})->name('about'); */


/* Route::get('contact-us', function () {
    return 'this is contact us page';
})->name('contact'); */
