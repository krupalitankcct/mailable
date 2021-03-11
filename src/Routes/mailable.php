<?php

Route::group(['prefix' => '', 'as' => 'template.'], function () {
    Route::get('/admin/template', 'MailablesController@index')->name('templatelist');
    Route::get('/admin/new', 'MailablesController@create')->name('templatecreate');
    Route::post('/admin/create', 'MailablesController@store')->name('templatestore');
    Route::get('/admin/edit/{id}', 'MailablesController@edit')->name('templateedit');
    Route::post('/admin/update/{id}', 'MailablesController@update')->name('templateupdate');
    Route::post('/admin/upload', 'MailablesController@upload')->name('templateupload');
	Route::get('/admin/destroy/{id}', 'MailablesController@destroy')->name('templatedestroy');
	Route::get('/admin/active/{id}', 'MailablesController@active')->name('templateactive');
    Route::get('/admin/inactive/{id}', 'MailablesController@inactive')->name('templateinactive');
   
});
