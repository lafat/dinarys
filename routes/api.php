<?php

use Illuminate\Http\Request;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::resource('/register', 'UserController', ['only' => [
    'store'
]]);

Route::group(['middleware' => 'auth:api'], function(){

    Route::resource('/profile', 'ProfileController', ['only' => [
        'index', 'update'
    ]]);

    Route::resource('/coordinates', 'CoordinatesController');

});

