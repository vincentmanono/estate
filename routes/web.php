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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/',function(){
// return view('layouts.mainapp');});
Route::get('/','PageController@index');
Route::get('/properties','PageController@property');
Route::get('singleproperty/{id}','PageController@show')->name('single.show');
Route::get('propertygallery/{id}','PageController@images')->name('property.images');
Route::post('/propertyapplication','PageController@store')->name('request.application');

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/tenant', 'HomeController@index')->name('tenant');
    Route::get('/manager', 'HomeController@index')->name('manager');
    Route::get('/all-users', 'UserController@allUsers')->name('allUsers');
    // users
    Route::get('my-profile/{slug}', 'UserController@showUserProfile')->name('show.user.profile');
    Route::get('/user/create', 'UserController@createUser')->name('createUser')->middleware('manager') ;
    Route::get('/user/{user}', 'UserController@showUser')->name('showUser');
    Route::get('/user/{user}/edit', 'UserController@editUser')->name('editUser')->middleware('manager') ;
    Route::put('/user/{user}/edit', 'UserController@updateUser')->name('updateUser')->middleware('manager') ;
    Route::get('/all-tenants', 'UserController@allTenants')->name('allTenants');
    Route::get('/tenant/{tenant}/{unit}','UserController@tenantUnit')->name('tenantUnit');
    Route::post('add-user','UserController@addUser')->name('addUser')->middleware('manager') ;
    Route::delete('delete-user/{user}','UserController@deleteUser')->name('deleteUser')->middleware('manager') ;

    // reports
    Route::get('occupancyreport','LeaseController@leaseReport')->name('occupancy.report');
    Route::get('tenantreport','UserController@tenantReport')->name('tenant.report');
    Route::get('/rentreport','RentController@rentReport')->name('rent.report');
    Route::get('/depositreport','DepositController@depositReport')->name('deposit.report');
    Route::get('/waterreport','WaterController@waterReport')->name('water.report');

    // branch
    Route::get('/branches','BranchController@allBranches')->name('allBranches');
    Route::get('/branch/{id}','BranchController@show')->name('singleBranch');
    Route::get('/createbranch','BranchController@create')->name('create.branch')->middleware('manager') ;
    Route::post('/newbranch','BranchController@store')->name('store.branch')->middleware('manager') ;
    Route::get('/editbranch/{id}','BranchController@edit')->name('editBranch')->middleware('manager') ;
    Route::put('/updatebranch/{id}','BranchController@update')->name('update.branch')->middleware('manager') ;
    Route::delete('deletebranch/{id}','BranchController@destroy')->name('destroy.branch')->middleware('manager') ;

    // porperty
    Route::get('/property/{id}/images','PropertyImageController@create')->name('property.images.create')->middleware('manager');
    Route::post('/property/{id}/images','PropertyImageController@store')->name('property.images.store')->middleware('manager');
    Route::post('/property/images','PropertyImageController@fileDestroy')->name('property.images.destroy');
    Route::resource('property', 'PropertyController');

    //unit,rent,water,deposit,payment,lease,tenantservice
    Route::resource('unit', 'UnitController');
    Route::resource('rent', 'RentController');
    Route::resource('deposit', 'DepositController');
    Route::resource('water', 'WaterController');
    Route::resource('payment', 'PaymentController');
    Route::resource('lease','LeaseController');
    Route::resource('tenantservice', 'TenantServiceController');

    Route::get('lease/tenant/{lease}','LeaseController@showpadsign')->name('showpadsign');


    Route::resource('payment', 'PaymentController');

    Route::resource('messages', 'MessageController');
    Route::get('leaseform','LeaseController@leaseform')->name("lease.form");
    Route::get('chiefinvestlease','LeaseController@chiefinvlease')->name('chiefinv.lease');


    // manager
    Route::middleware(['manager'])->prefix('manager')->group( function () {
        Route::get('property/{property}' , 'ManagerController@property')->name('manager.property');
        Route::get('expenses/{property}' , 'ManagerController@expenses')->name('manager.property.expenses');
        Route::get('expenses/{property}/create' , 'ManagerController@expensesCreate')->name('manager.property.expenses.create');
        Route::post('expenses/{property}/store' , 'ManagerController@expensesStore')->name('manager.property.expenses.store');
        Route::get('expenses/{expense}/edit' , 'ManagerController@expensesEdit')->name('manager.property.expenses.edit');
        Route::put('expenses/{expense}/update' , 'ManagerController@expensesUpdate')->name('manager.property.expenses.update');
        Route::post('expenses/{expense}/solved', 'ManagerController@expensesApprove')->name('manager.property.expenses.approve');
        Route::delete('expenses/{expense}/delete' , 'ManagerController@expensesDelete')->name('manager.property.expenses.delete');
        Route::post('unit/{unit}/floor', 'FloorController@store')->name('unit.floor.store');
        Route::put('floor/{floor}', 'FloorController@update')->name('unit.floor.update');
        Route::get('applications', 'ApplicationController@index')->name('application.index')->middleware('manager');
        Route::put('/application/approvedecline/{application}', 'ApplicationController@approveDecline')->name('application.status')->middleware('manager');
        Route::put('tenantservice/approvedecline/{service}','TenantServiceController@acceptDecline')->name('tenantservice.status');
        Route::resource('service', 'ServiceController');
        Route::put('water-reading-update/{unit}','WaterController@waterReadingUpdate')->name('water.reading') ;
        Route::put('water-payment-update/{water}','WaterController@waterPayment')->name('water.payment') ;
        Route::get('send-sms','SmsController@create')->name('create.sms') ;
        Route::get('all-send-sms','SmsController@index')->name('all.send.sms') ;
        Route::post('send-sms','SmsController@store')->name('store.sms') ;
        Route::delete('send-sms//{sms}','SmsController@destroy')->name('delete.sms') ;
        Route::get('all-properties-rent-tax','TaxController@index')->name('property.rent.tax.index') ;
        Route::delete('property-rent-tax/{tax}','TaxController@destroy')->name('property.rent.tax.delete') ;
        Route::resource('property/{property}/expense', 'ExpenseController');
    }) ;

});
