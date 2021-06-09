<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ArticleController;
use App\Http\Controller\AuthorsController;
use App\Http\Controller\CategoryController;
use App\Http\Controller\ContentController;
use App\Http\Controller\TypeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard/admin')->group(function (){
        // Route artikel
        Route::resource('article', Backend\ArticleController::class, ['names' => [
            'index' => 'article'
        ]]);
        // Route author
        Route::resource('authors', Backend\AuthorsController::class, ['names' => [
            'index' => 'authors'
        ]]);
        // Route Category
        Route::resource('category', Backend\CategoryController::class, ['names' => [
            'index' => 'category'
        ]]);
        // Route Content
        Route::resource('content', Backend\ContentController::class, ['names' => [
            'index' => 'content'
        ]]);
        Route::resource('type', Backend\TypeController::class, ['names' => [
            'index' => 'type'
        ]]);

    });
});

// Route::middleware(['auth'])->group(function () {
//     Route::prefix('admin')->group(function )
// });
require __DIR__.'/auth.php';
