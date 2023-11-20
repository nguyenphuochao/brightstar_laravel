<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\SliderController as BackendSliderController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

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
// ---------------------------Front end-------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('danh-muc/{slug}', [HomeController::class, 'show'])->name('show');
// ---------------------------Back end--------------------------------------------
Route::get('login', [LoginController::class, 'login'])->name('category.login');
Route::post('login', [LoginController::class, 'post_login'])->name('category.post_login');
Route::get('logout', [LoginController::class, 'logout'])->name('category.logout');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth_user'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('add/category_child',[CategoryController::class,'add_category_child'])->name('category.add_category_child');
    // Slider CRUD
    Route::resource('slider', BackendSliderController::class);
});
Route::get('pass', function () {
    echo bcrypt(123);
});
Route::get('/clear-config-cache', function () {
    $exitCode = Artisan::call('config:cache');

    return "Config cache cleared successfully.";
});
