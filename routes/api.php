<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// api/register
Route::post('register', 'Api\UserController@register');

// api/login
Route::post('login', 'Api\UserController@login');

// api/requestTAC
Route::post('requestTAC', 'Api\UserController@requestTAC');

// api/changePassword
Route::post('changePassword', 'Api\UserController@changePassword');

// api/loans/{loan_id}/return
Route::post('loans/{loan}/return', 'Api\LoanController@return');

Route::group(['middleware' => 'auth:api'], function () {
    // api/logout
    Route::post('logout', 'Api\UserController@logout');

    // api/user/details
    Route::post('user/details', 'Api\UserController@details');

    // api/book/search
    Route::post('book/search', 'Api\BookController@search');

    // api/book/searchByCopyNo
    Route::post('book/searchByCopyNo', 'Api\BookController@searchByCopyNo');

    // api/loans/{book_copy_id}/borrow
    Route::post('loans/{bookCopy}/borrow', 'Api\LoanController@borrow');

    // api/loans/{loan_id}/renew
    Route::post('loans/{loan}/renew', 'Api\LoanController@renew');

    // api/loans/onLoanDetails
    Route::post('loans/onLoanDetails', 'Api\LoanController@onLoanDetails');

    // api/holds/{book_id}/reserve
    Route::post('holds/{book}/reserve', 'Api\BookHoldController@reserve');


    // api/holds/{book_hold_id}/holding
    Route::post('holds/{bookHold}/holding', 'Api\BookHoldController@holding');

    // api/holds/{book_hold_id}/release
    Route::post('holds/{bookHold}/release', 'Api\BookHoldController@release');

    // api/holds/{book_hold_id}/pickup
    Route::post('holds/{bookHold}/pickup', 'Api\BookHoldController@pickup');

    // api/holds/{book_hold_id}/holdDetails
    Route::post('holds/holdDetails', 'Api\BookHoldController@holdDetails');

    
});
