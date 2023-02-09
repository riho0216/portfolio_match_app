<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\GendersController;
use App\Http\Controllers\Admin\SizesController;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    // post
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{id}/show', [PostController::class, 'show'])->name('post.show');
    Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{id}/delete', [PostController::class, 'destroy'])->name('post.destroy');

    // comments
    Route::post('comment/{post_id}/store', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comment/{post_id}/delete', [CommentController::class, 'destroy'])->name('comment.destroy');

    // like
    Route::post('like/{post_id}/store', [LikeController::class, 'store'])->name('like.store');
    Route::delete('like/{post_id}/delete', [LikeController::class, 'destroy'])->name('like.destroy');

    // profile
    Route::get('profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/{id}/update',[ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{id}/cart',[ProfileController::class, 'cart'])->name('profile.cart');

    // cart
    Route::post('cart/{post_id}/store', [CartController::class, 'store'])->name('cart.store');
    Route::delete('cart/{post_id}/delete', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('cart/calculate', [CartController::class, 'calculate'])->name('cart.calculate');

    Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
        
        // users
        Route::get('/users', [UsersController::class,'index'])->name('users');
        Route::delete('users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
        Route::patch('users/{id}/activate', [UsersController::class, 'activate'])->name('users.activate');

        // posts
        Route::get('/posts', [PostsController::class, 'index'])->name('posts');
        Route::delete('/posts/{id}/hidepost', [PostsController::class, 'hidepost'])->name('posts.hidepost');
        Route::patch('/posts/{id}/unhidepost', [PostsController::class, 'unhidepost'])->name('posts.unhidepost');

        // genders
        Route::get('/genders', [GendersController::class, 'index'])->name('genders');
        Route::post('gender/store', [GendersController::class, 'store'])->name('gender.store');
        Route::get('gender/{id}/edit', [GendersController::class, 'edit'])->name('gender.edit');
        Route::patch('gender/{id}/update', [GendersController::class, 'update'])->name('gender.update');
        Route::delete('gender/{id}/delete', [GendersController::class, 'destroy'])->name('gender.destroy');

        // sizes
        Route::get('/sizes', [SizesController::class, 'index'])->name('sizes');
        Route::post('size/store', [SizesController::class, 'store'])->name('size.store');
        Route::get('size/{id}/edit', [SizesController::class, 'edit'])->name('size.edit');
        Route::patch('size/{id}/update', [SizesController::class, 'update'])->name('size.update');
        Route::delete('size/{id}/delete', [SizesController::class, 'destroy'])->name('size.destroy');
    });
    
});


