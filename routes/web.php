<?php

use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BaseController;

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

Route::get('/', function () {
    return view('welcome');
});

// ini route admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::controller(BaseController::class)->group(function() {
        Route::get('/home', 'index')->name('index.home');
    });
    Route::controller(TagController::class)->group(function() {
        Route::get('/tags', 'tag')->name('admin.index.tag');
        Route::post('/tags/create', 'createTag')->name('admin.create.tag');
        Route::put('/tags/update', 'updateTag')->name('admin.update.tag');
        Route::delete('/tags/delete', 'deleteTag')->name('admin.delete.tag');
    });
});
// ini route mentor

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
