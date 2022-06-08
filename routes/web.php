<?php

use App\Http\Controllers\LinkController;
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
    return view('welcome');
});
Route::prefix('links')->name('link.')->group(function () {
    Route::get('/mostaccessed', [LinkController::Class,'get100MostAccessed'])->name('mostAccessed');
    Route::get('/redirect/{data}', [LinkController::Class,'redirectShortedLink'])->name('redirect');
});
