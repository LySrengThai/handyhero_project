<?php

use App\Http\Controllers\Company\CompanyControllerManagement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\maincontroller;

//database insert
use App\Http\Controllers\register_homecontroller;
use App\Http\Controllers\companyregister_homecontroller;
use App\Http\Controllers\logincontroller;


//get from database 
use App\Http\Controllers\companycontroller;
use Faker\Provider\ar_JO\Company;

Route::get('/homepage', function () {
    return view('userpage.homepage');
});

//yok pi dataabase
Route::get('/home', [maincontroller::class, 'listdetail'])->middleware('authcheck');
Route::get('/service', [maincontroller::class, 'service_listdetail']);

//yok pi dtb
Route::get('/company', [maincontroller::class, 'company_listdetail'])->middleware('authcheck');

Route::get('/company_detail{company_id}', [companycontroller::class, 'list_companydetail'])->middleware('authcheck');

Route::get('/service_detail{service_id}', [companycontroller::class, 'list_servicedetail'])->middleware('authcheck');


// Route::get('/service_detail', function(){
//     return view('userpage.service_detail');
// })->middleware('authcheck');

Route::get('/acc_setting', [maincontroller::class, 'userSetting'])->middleware('authcheck');

Route::get('/register-user', function () {
    return view('userpage.register_user');
});

Route::get('/register-provider', function () {
    return view('userpage.register_provider');
});

// Company Register & Login

Route::get('/companylogin', [logincontroller::class, 'company_login']);
Route::post('/companyLoggedIn', [logincontroller::class, 'company_loggedin'])->name('companyLoggedIn');
Route::get('/companypage', [CompanyControllerManagement::class, 'listing'])->name('companypage');


Route::get('/login', [logincontroller::class, 'user_login']);
Route::post('/userLoggedIn', [logincontroller::class, 'user_loggedin'])->name('userLoggedIn');
Route::get('/logout', [logincontroller::class, 'logout']);

// Route::get('/login', function(){
//     return view('login');
// });

Route::get('/contact', [maincontroller::class, 'contactUS'])->middleware('authcheck');

Route::get('/booking', [maincontroller::class, 'bookService'])->middleware('authcheck');


//Insert User registraiton data into database
Route::get('/hehe', [register_homecontroller::class, 'register_homeIndex']);
Route::post('dataInsert', [register_homecontroller::class, 'register_DataInsert']);

//Insert company register data into database
// Route::get('/', [companyregister_homecontroller::class, 'companyregister_homeIndex']);
Route::post('companyregister_dataInsert', [companyregister_homecontroller::class, 'companyregister_DataInsert']);
