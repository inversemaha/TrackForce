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

//category start
Route::get('/admin/category/category-setup', 'CategoryController@setUpcategory');
Route::post('/admin/category/save-category', 'CategoryController@savecategory');
Route::get('/admin/category/view-category', 'CategoryController@viewcategory');
Route::get('/admin/category/edit/{id}', 'CategoryController@editcategory');
Route::post('/admin/category/edited-save-category', 'CategoryController@editedSavecategory');
Route::get('/admin/category/delete/{id}', 'CategoryController@deleteCategory');

//Product setup
Route::get('/admin/product/add-product','ProductController@addProduct');
Route::post('/admin/product/save-product','ProductController@saveProduct');
Route::get('/admin/product/view-product','ProductController@viewProduct');

Route::get('/admin/product/archive-product', 'ProductController@archiveProduct');
Route::get('/admin/product/edit/{id}', 'ProductController@editProduct');
Route::get('/admin/product/update-active-status/{id}/{active_status}', 'ProductController@productActivateStatusChange');
Route::post('/admin/product/save-edited-product', 'ProductController@saveEditedProduct');