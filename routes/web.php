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
Route::group(['middleware'=>'auth'],function(){
    Route::resource('/article', 'ArticleController');
    Route::get('/article',[DisplayController::class,'article'])->name('article');
    Route::get('/article_create',[DisplayController::class,'articleCreate'])->name('article.create');
    Route::get('/topics_category',[RegistrationController::class,'topicsCategory'])->name('topics.category');
    Route::get('/topics',[RegistrationController::class,'topics'])->name('topics');
    // Route::post('/article_create_conf',[RegistrationController::class,'newArticle'])->name('newarticle');
    Route::get('/', [DisplayController::class,'index']);
});

Route::get('/article_serch',[DisplayController::class,'articleSerch'])->name('article.serch');
Route::post('/article_serch',[DisplayController::class,'articleSerch'])->name('article.serch');
// Route::post('/serch',[DisplayController::class,'serch'])->name('');
// Route::get('/select_spend',[RegistrationController::class,'selectSpend'])->name('');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
