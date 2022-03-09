<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\NewsController;
use App\Http\Controllers\Web\TopHeadlineController;

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



Route::middleware(['auth'])->group(function ()
{

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('top-headlines', [TopHeadlineController::class, 'index'])->name('headlines.index');
    Route::post('top-headlines', [TopHeadlineController::class, 'store'])->name('headlines.store');


    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');




});

require __DIR__.'/auth.php';
