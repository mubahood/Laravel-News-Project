<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('about-us', [MainController::class, 'about_us']);
Route::get('contact-us', [MainController::class, 'contact_us']);

/* Route::get('about-us', function () {
    return route('contact');
})->name('about'); */



Route::get('news-details/{id}', function ($id) {
    return 'news-details for post => ' . $id;
})->name('about');


Route::get('contact-us', function () {
    return 'this is contact us page';
})->name('contact');
