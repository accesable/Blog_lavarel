<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class,'index']);
Route::post('tasks/create',[TaskController::class,'store'])->name('task.create');
Route::delete('tasks/delete/{task}',[TaskController::class,'destroy'])->name('task.destroy');