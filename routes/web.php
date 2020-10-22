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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/all-users', 'UserController@allUsers')->name('allUsers');
    Route::get('/user/create', 'UserController@createUser')->name('createUser');
    Route::get('/user/{user}', 'UserController@showUser')->name('showUser');
    Route::get('/user/{user}/edit', 'UserController@editUser')->name('editUser');
    Route::put('/user/{user}/edit', 'UserController@updateUser')->name('updateUser');



    Route::get('/all-tenants', 'UserController@allTenants')->name('allTenants');
    Route::post('add-user','UserController@addUser')->name('addUser');
    Route::delete('delete-user/{user}','UserController@deleteUser')->name('deleteUser');
    Route::get('/branches','BranchController@allBranches')->name('allBranches');
    Route::get('/branch/{id}','BranchController@show')->name('singleBranch');
    Route::get('/createbranch','BranchController@create')->name('create.branch');
    Route::post('/newbranch','BranchController@store')->name('store.branch');
    Route::get('/editbranch/{id}','BranchController@edit')->name('editBranch');
    Route::put('/updatebranch/{id}','BranchController@update')->name('update.branch');
    Route::delete('deletebranch/{id}','BranchController@destroy')->name('destroy.branch');
    Route::resource('/property', 'PropertyController');
    Route::resource('service', 'ServiceController');
    Route::resource('unit', 'UnitController');
    Route::resource('rent', 'RentController');
    Route::resource('deposit', 'DepositController');
    Route::resource('water', 'WaterController');



});
