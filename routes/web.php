<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ListController;
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

Route::get('/', function () {return view('welcome');});
Route::get('/error', function () {return view('error');});
Route::get('/list', [ListController::class, 'list']);
Route::post('filter-by-city', 'ListController@filterByCity')->name('filter.by.city');
Route::get('/export-users', [ListController::class, 'exportUsers']);

Route::post('/post', [PostController::class, 'Submit']); 