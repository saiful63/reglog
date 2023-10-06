<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NormalUserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;






Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.data');
Route::get('/',[AuthController::class,'register_view'])->name('register.page');
Route::post('/',[AuthController::class,'register'])->name('register.data');

Route::group(['middleware'=>'auth'],function(){

    Route::group(['middleware'=>'adminEditorSimilar'],function(){
         Route::get('/user/home',[AuthController::class,'home'])->name('home');

         Route::group(['middleware'=>'adminRoleCheck'],function(){
            Route::get('/user/admin',[AuthController::class,'lome'])->name('lome');
         });
    });


    Route::group(['middleware'=>'userRoleCheck'],function(){
        Route::get('/normal_user_home',[NormalUserController::class,'normalUserHome'])->name('normalUserHome');
    });

    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});


// Route::get('/', function () {
//     return view('welcome');
// });
