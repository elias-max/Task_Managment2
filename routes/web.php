<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskcategoryController;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('auth.login');
});

//taskcategory
Route::get('/add-taskcategory', function () {
    return view('Admin.add_taskcategory');
})->middleware(['auth'])->name('add.taskcategory');

Route::post('/insert-taskcategory',[TaskcategoryController::class,'store'])->middleware(['auth']);

Route::get('/all-taskcategories',[TaskcategoryController::class,'taskcategoriesData'])->middleware(['auth'])->name('all.taskcategories');

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//task

//Route::get('tasks', '[TaskController::class, 'index']');
//Route::post('tasks', '[TaskController::class, 'post']');
//Route::put('tasks/{id}', '[TaskController::class, 'update']');
//Route::delete('tasks/{id}', '[TaskController::class, 'delete']');

//Route::resource('tasks', 'TaskController');




//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';