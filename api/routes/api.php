<?php

use Illuminate\Http\Request;
use Faker\Provider\ar_JO\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiCompanyController;
use App\Http\Controllers\Company\CompanyControllerManagement;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//======================================================================
//UNRESTRICTED PAGES
Route::get('/homepage', [apicontroller::class, 'listdetail']);
Route::get('/home', [apicontroller::class, 'listdetail']);
Route::get('/services', [apicontroller::class, 'service_listdetail']);
Route::get('/companies', [apicontroller::class, 'companylistdetail']);

//======================================================================
//RESTRICTED PAGES FOR USERS
Route::middleware('userAuth:userAuth')->group(function () {
    Route::controller(ApiUserController::class)->group(function () {
        Route::get('/user/home', 'listdetail');
        Route::post('/user/add','addNewUser');
        Route::get('/user/listallcompany', 'listallcompany');
        Route::get('/user/listallservice', 'listallservice');
        Route::post('/user/booking','booking');
    });
});
//======================================================================
//RESTRICTED PAGES FOR COMPANY
Route::middleware('companyAuth:companyAuth')->group(function () {
    //trov ka token
    Route::controller(ApiCompanyController::class)->group(function () {
        Route::get('/company/companyPage', 'listing');
        Route::post('company/add', 'addNewCompany');
        Route::post('/company/insertservice', 'serviceInsert');
    });
});

