<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ImagesController@index');

Route::post('/image', 'ImagesController@store');
