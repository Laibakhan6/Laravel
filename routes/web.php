<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('guard');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/login', function () {
   session()->put('user_id',1);
   return redirect('/');
});
Route::get('/logout', function () {
   session()->forget('user_id');
   return redirect('/');
});


Route::get('/no-access', function () {
    echo 'login first';
    die;
});


Route::middleware(['guard'])->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index']);
});