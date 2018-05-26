<?php

Route::get('/', 'LoginController@login');
Route::get('/login', 'LoginController@login');
Route::post('/check-login', 'LoginController@loginCheck');
Route::get('/admin-home', 'HomeController@adminHome');
Route::get('/setting', 'HomeController@adminSetting');
Route::post('/admin-save-edited-data', 'HomeController@adminSaveEditedData');
Route::get('/logout', 'HomeController@logout');

//employee Manage
Route::get('/admin/employee/add-employee', 'EmployeeController@addEmployee');
Route::post('/admin/employee/save-employee', 'EmployeeController@saveEmployee');
Route::get('/admin/employee/view-employee', 'EmployeeController@viewEmployee');
Route::get('/admin/employee/archive-employee', 'EmployeeController@archieveEmployee');

Route::get('/admin/employee/edit/{id}', 'EmployeeController@editEmployee');
Route::get('/admin/employee/delete/{id}', 'EmployeeController@deleteEmployee');
Route::get('/admin/employee/update-active-status/{id}/{active_status}', 'EmployeeController@employeeActivateStatusChange');
Route::post('/admin/employee/save-edited-employee', 'EmployeeController@saveEditedEmployee');
Route::get('/admin/employee/view/{id}', 'EmployeeController@employeeProfile');