<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\logincontroller;
use App\Http\Controllers\viewcontroller;
use App\Http\Controllers\companycontroller;
use App\Http\Controllers\servicecontroller;
use App\Http\Controllers\bookingcontroller;
use App\Http\Controllers\dashboardcontroller;



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

// Route::get('/user_info', function () {
//     return view('admin');
// });

Route::get('/admin_register', [logincontroller::class, 'admin_register'])->middleware('needtoLogIn');
Route::post('/registeredadmin', [logincontroller::class, 'registeradmin'])->name('registeredadmin');


Route::get('/admin_login', [logincontroller::class, 'login'])->middleware('alreadyLogIn');
Route::post('/logged', [logincontroller::class, 'loggedin'])->name('logged');
Route::get('/logout', [logincontroller::class, 'logout']);

Route::get('/dashboard', [dashboardcontroller::class, 'dashboardIndex']);

// User Infomation Route
Route::get('/user_info', [viewcontroller::class, 'user_data'])->middleware('needtoLogIn');
Route::get('/user_view{user_id}', [viewcontroller::class, 'user_view'])->middleware('needtoLogIn');
Route::post('/userInfo_update{user_id}', [viewcontroller::class, 'userinfo_update']);
Route::get('/user_delete{user_id}', [viewcontroller::class, 'user_del'])->middleware('needtoLogIn');
Route::get('/userdelete/{user_id}', [viewcontroller::class, 'delete_user'])->middleware('needtoLogIn');
Route::get('/userblock/{user_id}', [viewcontroller::class, 'block_user'])->name('user.block')->middleware('needtoLogIn');
Route::get('/userunblock/{user_id}', [viewcontroller::class, 'unblock_user'])->name('user.unblock')->middleware('needtoLogIn');

// Company Information Route
Route::get('/company_info', [companycontroller::class, 'company_data'])->middleware('needtoLogIn');
Route::get('/company_view{company_id}', [companycontroller::class, 'company_view'])->middleware('needtoLogIn');
Route::post('/companyInfo_update{company_id}', [companycontroller::class, 'companyinfo_update']);
Route::get('/company_delete{company_id}', [companycontroller::class, 'company_del'])->middleware('needtoLogIn');
Route::get('/companydelete/{company_id}', [companycontroller::class, 'delete_company'])->middleware('needtoLogIn');
// Service Information Route
Route::get('/service_info', [servicecontroller::class, 'service_data'])->middleware('needtoLogIn');
Route::get('/service_view{service_id}', [servicecontroller::class, 'service_view'])->middleware('needtoLogIn');
Route::post('/serviceInfo_update{service_id}', [servicecontroller::class, 'serviceinfo_update']);
Route::get('/service_delete{service_id}', [servicecontroller::class, 'service_del'])->middleware('needtoLogIn');
Route::get('/servicedelete/{service_id}', [servicecontroller::class, 'delete_service'])->middleware('needtoLogIn');

Route::get('/booking_info', [bookingcontroller::class, 'booking_data'])->middleware('needtoLogIn');
Route::get('/bookingcancel/{book_id}', [bookingcontroller::class, 'cancel_booking'])->name('booking.cancel')->middleware('needtoLogIn');
Route::get('/bookingcomplete/{book_id}', [bookingcontroller::class, 'complete_booking'])->name('booking.complete')->middleware('needtoLogIn');

// Route::get('/receipt_info', [receiptcontroller::class, 'receipt_data'])->middleware('needtoLogIn');
// Route::get('/receipt_view{receipt_id}', [receiptcontroller::class, 'receipt_view'])->middleware('needtoLogIn');



// Route::get('/company_info', function () {
//     return view('companyinfo.company_info');
// });
