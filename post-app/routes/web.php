<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\ChartController;

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
    // 미들웨어를 지정해줌

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

    // 미들웨어 한방에 한다

Route::get('/posts/create',
    [PostsController::class, 'create'])/*->middleware(['auth'])*/;
Route::post('/posts/store',
    [PostsController::class, 'store'])->name('posts.store')/*->middleware(['auth'])*/;
Route::get('/posts/index',
    [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/show/{id}',[PostsController::class, 'show'])->name('post.show');

Route::get('/posts/mypost',[PostsController::class,'myposts'])->name('posts.mine');

Route::get('/posts/{id}',[PostsController::class,'edit'])->name('post.edit');
Route::put('/posts/{id}',[PostsController::class,'update'])->name('post.update');
Route::delete('/posts/{id}',[PostsController::class,'destroy'])->name('post.delete');
Route::get('/chart/index',[ChartController::class, 'index']);
