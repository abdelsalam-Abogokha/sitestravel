<?php

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

Route::get('/', function () {return view('index');})->name('home');
Route::get('/about', function () {return view('about.index');})->name('about');
Route::get('/blog', function () {return view('blog.index');})->name('blog');
Route::get('/service', function () {return view('service.index');})->name('service');

Route::get('/blog-single', function () {return view('blog-single.index');})->name('blog-single');
Route::get('/contact', function () {return view('contact.index');})->name('contact');
Route::get('/hotel', function () {return view('hotel.index');})->name('hotel');
Route::get('/hotel-single', function () {return view('hotel-single.index');})->name('hotel-single');
Route::get('/tour', function () {return view('tour.index');})->name('tour');