<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::post('login', [AccessTokenController::class, 'issueToken'])->middleware(['api-login', 'throttle']);


//Route::middleware('auth:api')->group( function(){
    Route::get('/tasks/', 'TodoController@index');

    Route::post('/task/add', 'TodoController@store');
    
    Route::post('/task/update/{id}', 'TodoController@update');
    
    Route::post('/task/delete/{id}', 'TodoController@destroy');
//});

/*Route::group(['middleware' => ['web']], function () {
    Route::post('login','Auth\LoginController@login');  
    Route::post('register','Auth\RegisterController@register');  
    Route::post('logout','Auth\LoginController@logout');
    Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail'); 
    Route::post('password/reset','Auth\ResetPasswordController@reset');
       

});*/
