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
    Route::get('/users', 'UserController@allUsers')->name('allUsers');
    Route::get('/all-tenants', 'UserController@allTenants')->name('allTenants');
    Route::get('/branches','BranchController@allBranches')->name('allBranches');
    Route::get('/branch/{id}','BranchController@show')->name('singleBranch');
    Route::get('/editbranch/{id}','BranchController@edit')->name('editBranch');
    Route::put('/updatebranch/{id}','BranchController@update')->name('update.branch');
    Route::delete('deletebranch/{id}','BranchController@destroy')->name('destroy.branch');
    Route::get('/createbranch','BranchController@create')->name('create.branch');
    Route::post('/newbranch','BranchController@store')->name('store.branch');
});
