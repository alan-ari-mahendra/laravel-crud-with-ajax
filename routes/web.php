<?php

use App\Http\Controllers\CrudController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home',     [CrudController::class, 'index']);
Route::get('/read',  [CrudController::class, 'read']);
Route::get('/create', [CrudController::class, 'create']);
Route::get('/store',    [CrudController::class, 'store']);
Route::get('/show/{id}', [CrudController::class, 'show']);
Route::get('/update/{id}', [CrudController::class, 'update']);
Route::get('/destroy/{id}', [CrudController::class, 'destroy']);
Route::get('/deleted', [CrudController::class, 'deleted'])->name('users.deleted');
Route::post('users/{id}/restore', [CrudController::class, 'restore'])->name('users.restore');
