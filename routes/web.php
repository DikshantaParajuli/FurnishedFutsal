<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/nav', '')


Route::get('/adminoffutsal',function(){
   return view('admin.adminregister'); 
});

//Route::get('admin/home','AdminController@index')->name('admin.admin');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login')->name('admin.adminlogin');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/adminregister','Admin\RegisterController@store');
Route::get('admin/dashboard','Admin\AdminController@index');



//Admin Manually Booking Ground for Customer
Route::get('/admin/booking', 'Admin\AdminBookingController@index');
Route::post('admin/booking', 'Admin\AdminBookingController@store');

//Admin Viewing Bookings
Route::get('admin/viewBooking', 'Admin\AdminBookingController@viewBooking');
Route::post('admin/viewBooking', 'Admin\AdminBookingController@searchBooking');


// Ground Routes Handling by Admin
Route::get('/admin/ground', 'GroundController@index');
Route::post('/admin/ground', 'GroundController@store');
Route::get('/admin/delground/{id}', 'GroundController@destroy');

// Admin Moving Confirmed Booking to Sales
Route::post('admin/movetoSales', 'Admin\AdminBookingController@moveSales');
Route::get('admin/sales', 'Admin\AdminBookingController@viewSales');
Route::post('admin/viewSold', 'Admin\AdminBookingController@displaySearch');

//Admin Adding Expenses
Route::get('addExpense', 'Admin\ExpenseController@index');
Route::post('/enter', 'Admin\ExpenseController@enterExpense');
Route::get('viewExpense', 'Admin\ExpenseController@viewExpense');
Route::post('searchExpense', 'Admin\ExpenseController@searchExpense');

//Admin Stocks
Route::get('admin/showStocks', 'Admin\ExpenseController@showStocks');

//Admin Gallery Part
Route::get('addEvent', 'Admin\EventController@index');
Route::post('addEvent', 'Admin\EventController@addEvent');
Route::get('/admin/showEvent', 'Admin\EventController@showEvent');
Route::get('/admin/delevent/{id}', 'Admin\EventController@delEvent');

// Client Booking Ground
Route::get('/booking', 'BookingController@index'); // getting booking page
Route::post('/booking', 'BookingController@store');
Route::get('/viewGrounds', 'ClientController@viewGrounds');

//Client Checking Own Bookings
Route::get('/mybooking', 'BookingController@show');

//Client Event View
Route::get('/events', 'ClientController@viewEvent');
Route::get('/eventDetails/{id}', 'ClientController@eventDetails');

Route::get('/package', 'PackageController@index');
Route::post('/enterpackage', 'PackageController@store');
Route::get('/delpack/{id}', 'PackageController@destroy');


