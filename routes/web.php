<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Login
Route::get('/login', function(){
    return view('login');
});



//Employee List - Admin
Route::get('/adminEmployeeList', function(){
    return view('adminEmployeeList');
});

//Employee Add - Admin
Route::get('/adminEmployeeAdd', function(){
    return view('adminEmployeeAdd');
});

//Employee Edit - Admin
Route::get('/adminEmployeeEdit', function(){
    return view('adminEmployeeEdit');
});

//Employee Edit - Admin
Route::get('/team', function(){
    return view('team');
});


Route::get('/login','PagesController@indexLogin');

// Route::get('/dashboard','PagesController@indexAdminDashboard');

Route::post('/addEmp', 'App\Http\Controllers\EmpController@store' );

//employee view employee list
Route::get('/adminEmployeeList', 'App\Http\Controllers\EmpController@emp_view' );


//search
Route::get('/search', 'App\Http\Controllers\EmpController@search_emp');


//print PDF
Route::get('/admin/pdf', [EmpController::class, 'downloadPdf']);

//Admin Dashboard
Route::get('/adminDashboard', 'App\Http\Controllers\EmpController@dashboard');
