<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ArticlesController
Route::controller(ArticlesController::class)->middleware(['auth'])->group(function(){
    Route::get('/index', 'top')->name('top');                   //TOPページ表示
    Route::post('/posts', 'store')->name('store');              //保存処理
    Route::get('/posts/create', 'create')->name('create');      //記事の新規投稿
    Route::get('/posts/myposts', 'myposts')->name('myposts');   //自分が投稿した記事の一覧
    Route::get('/posts/{article}', 'show')->name('show');       //記事の閲覧
    Route::put('/posts/{article}', 'update')->name('update');   //記事の更新
    Route::delete('/posts/{article}', 'delete')->name('delete');//記事の削除
    Route::get('/posts/{article}/edit', 'edit')->name('edit');  //記事の編集
});

require __DIR__.'/auth.php';
