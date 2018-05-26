<?php

Route::get('/', 'LoginController@login');
Route::get('/login', 'LoginController@login');
Route::post('/check-login', 'LoginController@loginCheck');
Route::get('/admin-home', 'HomeController@adminHome');
Route::get('/setting', 'HomeController@adminSetting');
Route::post('/admin-save-edited-data', 'HomeController@adminSaveEditedData');
Route::get('/logout', 'HomeController@logout');