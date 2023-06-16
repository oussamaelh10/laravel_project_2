<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;



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


Route::get('/', [PostController::class, 'index'])->name('index');

Route::resource('posts', PostController::class);

Route::get('like/{postid}', [LikeController::class, 'like'])->name('like'); 

Route::get('user/{name}', [UserController::class, 'profile'])->name('profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profile', [UserController::class, 'Profile'])->name('Profile');
Route::put('/profile/{name}', [UserController::class, 'update'])->name('profile.update');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/thankyou', [ContactController::class, 'thankyou'])->name('contact.thankyou');

// FAQ-Routes 
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
Route::resource('faq/items', 'FAQItemController');




