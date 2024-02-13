<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Testcontroller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('role:admin|writter')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




/**
 * CATEGORY
 */

Route::middleware('auth')->prefix('category')->name('category.')->controller(CategoryController::class)->group(
    function(){

        Route::post('/add','addcategory')->name('add');
        Route::get('/show','showcategory')->name('show');
        Route::get('/edite/{slug} ','editecategory')->name('edite');
        Route::put('/update/{id}','categoryupdate')->name('update');
        Route::delete('/delete/{id}','deletecategory')->name('delete');

    }
);


/**
 * POST
 */

Route::middleware('auth')->prefix('post')->name('post.')->controller(PostController::class)->group(
    function (){

        
        Route::get('/add','postadd')->name('add');
        Route::post('/store','storepost')->name('store');

        Route::get('/show-all','showpost')->name('show.all');

        Route::get('/edite/{slug}','editepost')->name('edite');
        Route::put('/update/{slug}','postupdate')->name('update');

        Route::delete('/delete/{id}','postdelete')->name('delete');

    }
);

