<?php

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


use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController as PublicNewsController;
use Illuminate\Support\Facades\Route;


Route::get('/',
    [
        GreetingController::class, 'index'
    ]
)->name('greeting');;

//routs
Route::get('/news/',
    [
        PublicNewsController::class, 'index'
    ]
)->name('news');


Route::group(['middleware' => 'auth'], static function () {
    Route::group(['prefix' => 'account'], static function () {;
        Route::get('/', AccountController::class);
        Route::get('/profile', AccountController::class)
            ->name('account.profile');
    });

    Route::group([
        'prefix'     => 'admin',
        'as'         => 'admin.',
        'middleware' => 'check.admin'
    ], static function () {
        Route::get('/', AdminIndexController::class)->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/sources', AdminSourceController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUsersController::class);
    });
});

Route::get('/news/category/{category}',
    [
        PublicNewsController::class, 'category'
    ]
)
    ->where('category', '\d+')
    ->name('news.category');

Route::get('/newscategoryes',
    [
        CategoryController::class, 'index'
    ]
)->name('newscategoryes');

Route::get('/news/{id}',
    [
        PublicNewsController::class, 'show'
    ]
)
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/source/create',
    [
        SourceController::class, 'create'
    ]
)
    ->name('source.create');

Route::get('/login',
    [
        LoginController::class, 'index'
    ]
)->name('login');


//Route::get('/{page}', function ($page) {
//    return view($page);
//});


Route::post('/source/store',
    [
        SourceController::class, 'store'
    ]
)->name('source.store');;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
