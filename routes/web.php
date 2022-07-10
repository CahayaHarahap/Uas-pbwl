<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', 'DashboardController@index')->name('/');

    // book
    Route::get('category', 'CategoryController@index')->name('category');
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    Route::post('category', 'CategoryController@insert')->name('category.insert');
    Route::get('category/edit/{category}', 'CategoryController@edit')->name('category.edit');
    Route::put('category', 'CategoryController@update')->name('category.update');
    Route::delete('category', 'CategoryController@delete')->name('category.delete');

    Route::get('income', 'IncomeController@index')->name('income');
    Route::get('income/create', 'IncomeController@create')->name('income.create');
    Route::post('income', 'IncomeController@insert')->name('income.insert');
    Route::get('income/edit/{income}', 'IncomeController@edit')->name('income.edit');
    Route::put('income', 'IncomeController@update')->name('income.update');
    Route::delete('income', 'IncomeController@delete')->name('income.delete');

    Route::get('expenditure', 'ExpenditureController@index')->name('expenditure');
    Route::get('expenditure/create', 'ExpenditureController@create')->name('expenditure.create');
    Route::post('expenditure', 'ExpenditureController@insert')->name('expenditure.insert');
    Route::get('expenditure/edit/{expenditure}', 'ExpenditureController@edit')->name('expenditure.edit');
    Route::put('expenditure', 'ExpenditureController@update')->name('expenditure.update');
    Route::delete('expenditure', 'ExpenditureController@delete')->name('expenditure.delete');

    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::post('user', 'UserController@insert')->name('user.insert');
    Route::get('user/edit/{user}', 'UserController@edit')->name('user.edit');
    Route::put('user', 'UserController@update')->name('user.update');
    Route::delete('user', 'UserController@delete')->name('user.delete');
    
});


