<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Website\Albums\AlbumController;
use App\Http\Controllers\Website\Albums\ImageController;
use App\Http\Controllers\admin\AlbumController as BackendAlbumController;
use App\Http\Controllers\Website\Auth\AuthController;
use App\Http\Controllers\Website\HomeController;
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

/*************************************** Website Routes ***************************************/
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('register', [AuthController::class, 'registerForm'])->name('register');
Route::post('register', [AuthController::class, 'registerSubmit'])->name('register.submit');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'loginSubmit'])->name('login.submit');

Route::group(['middleware' => 'auth'], function() {
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('profile', [AuthController::class, 'update'])->name('profile.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('albums', AlbumController::class);
    Route::get('albums/{id}/add-image', [ImageController::class, 'create'])->name('image.add');
    Route::post('album/add-image', [ImageController::class, 'store'])->name('image.submit');
    Route::get('image/{id}/delete', [ImageController::class, 'delete'])->name('image.delete');

});

/*************************************** Admin Routes ***************************************/
Route::group(['prefix' => 'admin'], function (){
    Route::get('login', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'loginSubmit'])->name('admin.login');
    Route::group(['middleware' => 'admin'], function() {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('users', UserController::class);
        Route::get('albums', [BackendAlbumController::class, 'index'])->name('admin.albums.index');
        Route::get('albums/{id}', [BackendAlbumController::class, 'show'])->name('admin.albums.show');
        Route::get('albums/{id}/edit', [BackendAlbumController::class, 'edit'])->name('admin.albums.edit');
        Route::put('albums/{id}', [BackendAlbumController::class, 'update'])->name('admin.albums.update');

    });
});




