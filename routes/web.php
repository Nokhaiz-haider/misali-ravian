<?php

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

Route::prefix('home')->group(function () {
    
    Route::resource('admissions/new-register', 'NewRegController');

    Route::resource('fee', 'FeeController');
    
    Route::get('/define/session','DefineController@show_session')->name('create-session');
    Route::post('/define/session', 'DefineController@create_session')->name('create-session');

    // Route::get('define/fee', 'DefineController@show_fee')->name('define-fee');
    // Route::post('define/fee', 'DefineController@define_fee')->name('define-fee');
    
    Route::get('define/section', 'DefineController@show_section')->name('define-section');
    Route::post('define/section', 'DefineController@define_section')->name('define-section');
    
    Route::get('search/name','SearchController@show_name')->name('search_name');
    Route::post('search/name', 'SearchController@search_name')->name('search_name');
    
    Route::get('search/session', 'SearchController@show_session')->name('search_sess');
    Route::post('search/session', 'SearchController@search_session')->name('search_sess');
    
    Route::get('search/class', 'SearchController@show_class')->name('search_class');
    Route::post('search/class', 'SearchController@search_class')->name('search_class');
    
    Route::get('set/individual-fee', 'SetInfoController@show_individual')->name('set_individual');
    Route::post('set/individual-fee', 'SetInfoController@set_individual')->name('set_individual');
    
    // Route::get('fee/create-history', 'SetInfoController@show_individual')->name('set_individual');
    // Route::post('fee/create-history', 'SetInfoController@show_individual')->name('set_individual');
    
    Route::resource('fee/history', 'StudentFeeHistory');

    Route::get('show/fee-history','SearchController@show_history')->name('get_history');
    Route::post('show/fee-history','SearchController@get_history')->name('get_history');
    
    Route::get('submit/fee','FeeSubmissionController@show_form')->name('submit_fee');
    Route::post('submit/fee','FeeSubmissionController@show_fee')->name('submit_fee');
    
    Route::get('fee-submit','FeeSubmissionController@submit_fee')->name('submit');

    
    Route::get('/show-sections/{class}','StudentRegController@search_section');
    Route::post('/show-sections/{class}','StudentRegController@search_section');
    
    Route::get('/show-total-fee/{class}','StudentRegController@search_total_fee');
    Route::post('/show-total-fee/{class}','StudentRegController@search_total_fee');
    
});
 

Route::get('/admin', function(){
    return view('dashboard');
})->name('admin');
