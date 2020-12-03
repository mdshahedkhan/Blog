<?php

use App\Http\Controllers\Admin\CategoryControllerr;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Frontend\SiteController;
use Illuminate\Support\Facades\Route;

/*
|<-------------------------------------------------------------------------->
| Web Routes
|<-------------------------------------------------------------------------->
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/single-post', [SiteController::class, 'singlePost'])->name('single-post');

// Login Register Route Define
Route::prefix('user')->name('user.')->group(function () {
    Route::post('/login', [SiteController::class, 'login'])->name('login');
    Route::get('/log-out', [SiteController::class, 'Logout'])->name('logout');
    Route::get('/login', [SiteController::class, 'loginShow'])->name('loginShow');
    Route::get('/register', [SiteController::class, 'registerShow'])->name('register');
    Route::post('/register', [SiteController::class, 'Register'])->name('store.register');
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/view/{id}', [CategoryControllerr::class, 'show'])->name('view');
        Route::get('/edit/{id}', [CategoryControllerr::class, 'edit'])->name('edit-show');
        Route::patch('/edit/{id}', [CategoryControllerr::class, 'update'])->name('update');
        Route::post('/add-category', [CategoryControllerr::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [CategoryControllerr::class, 'destroy'])->name('destroy');
        Route::get('/add-category', [CategoryControllerr::class, 'CategoryAdd'])->name('add-category');
        Route::get('/manage-category', [CategoryControllerr::class, 'index'])->name('manage-category');
        Route::get('/manage-category/{id}/{status}', [CategoryControllerr::class, 'Status'])->name('Status');
    });

    // Post Route Define
    Route::prefix('post')->name('post.')->group(function (){
        Route::get('/add', [PostController::class, 'create'])->name('add');
        Route::post('/add', [PostController::class, 'store'])->name('store');
        Route::get('/manage', [PostController::class, 'index'])->name('manage');
        Route::get('/manage/{id}/{status}', [PostController::class, 'status'])->name('status');
    });
});

