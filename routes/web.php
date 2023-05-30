<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/all-taskcateg3ories',[TaskcategoryController::class,'taskcategoriesData'])->middleware(['auth'])->name('all.taskcategories');

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//task

Route::post('/insert-task',[TaskController::class,'store'])->middleware(['auth']);

Route::get('/add-task',[TaskController::class,'create'])->middleware(['auth'])->name('add.task');
Route::get('/all-task',[TaskController::class,'tasksData'])->middleware(['auth'])->name('all.tasks');

//Route::delete('tasks/{id}', '[TaskController::class, 'delete']');


//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';