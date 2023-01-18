<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');

Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('store');
Route::delete('/tasks/{task:id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');

Auth::routes();


