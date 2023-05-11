<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('about-us', [MainController::class, 'about_us'])->name('about');
Route::get('contact-us', [MainController::class, 'contact_us'])->name('contact');

/* Route::get('about-us', function () {
    return route('contact');
})->name('about'); */



/* Route::get('news-details/{id}', function ($id) {
    return 'news-details for post => ' . $id;
})->name('about'); */


/* Route::get('contact-us', function () {
    return 'this is contact us page';
})->name('contact'); */
