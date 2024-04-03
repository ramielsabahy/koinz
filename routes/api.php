<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckBearerToken;

Route::group(['namespace' => 'App\Http\Controllers\Api'], function (){
    Route::post('login', 'AuthenticationController@login');
    Route::group(['middleware' => [CheckBearerToken::class, 'auth:sanctum']], function (){
        Route::post('interval', 'IntervalController@store');
        Route::get('recommendation', 'RecommendationController@index');
    });
});
