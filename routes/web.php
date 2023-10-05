<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', LandingController::class);

Route::get('/about', [AboutController::class, 'index']); //->name('about');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us.index');

Route::post('contact-us', [ContactController::class, 'store'])->name('contact-us.store');

Route::resource('articles', ArticleController::class);
