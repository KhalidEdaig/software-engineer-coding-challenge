<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController as UserLoginController;


use App\Http\Controllers\Auth\AuthController as UserAuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => '/auth'

], function ($router) {
    Route::post('/sign_in', [UserAuthController::class, 'sign_in']);
    Route::post('/sign_up', [UserAuthController::class, 'sign_up']);
    Route::post('/logout', [UserAuthController::class, 'logout']);
    Route::post('/refresh', [UserAuthController::class, 'refresh']);
    Route::get('/me', [UserAuthController::class, 'me']);
});

Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'
], function () {
    Route::post('/sign_in', [UserLoginController::class, 'sign_in']);
});

Route::resource('categories', CategoryController::class);
Route::post('categories/filtred', [CategoryController::class, 'getCategoriesFiltred']);

Route::resource('products', ProductController::class);


//Group Routes For users auther type users
/* Route::group([
    'middleware' => ['api', 'manage_token:api_user,ROLE_USER_ADMIN'],
    'prefix' => 'user'
], function () {
    Route::post('/home', 'User\Profile\HomeController@home');
}); */
