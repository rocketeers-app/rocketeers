<?php

Route::get('/', 'PostController@index');
Route::get('{post}', 'PostController@show')->where('post', '.*');
