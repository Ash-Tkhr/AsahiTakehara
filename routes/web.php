<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;


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
Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    Route::get('owner', [DisplayController::class, 'owner'])->name('owner');
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/article', 'ArticleController');
    Route::resource('mypage', 'UserController');
    Route::resource('comment', 'CommentController');
    Route::resource('Bookmark', 'BookmarkController');
    Route::resource('topic', 'TopicController');
    Route::get('/', [DisplayController::class, 'index'])->name('article.index');
    Route::get('/article', [DisplayController::class, 'article'])->name('article');
    Route::post('/article/all/{article}', [RegistrationController::class, 'articleAll'])->name('article.all');
    Route::get('/article/view/{article}', [DisplayController::class, 'articleView'])->name('article.view');
    Route::post('/article/create', [RegistrationController::class, 'store'])->name('article.store');
    Route::get('/topics_category', [RegistrationController::class, 'topicsCategory'])->name('topics.category');
    Route::post('article/comment', [RegistrationController::class, 'sendComment'])->name('send.comment');
    Route::post('/bookmark', [RegistrationController::class, 'bookmark'])->name('article.bookmark');
    Route::get('/article_search', [DisplayController::class, 'articleSearch'])->name('article.search');
    Route::get('/article/list', [DisplayController::class, 'articleList'])->name('article.list');
});


// Route::post('/serch',[DisplayController::class,'serch'])->name('');
// Route::get('/select_spend',[RegistrationController::class,'selectSpend'])->name('');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
