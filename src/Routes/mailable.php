<?php

Route::group(['prefix' => '', 'as' => 'template.'], function () {
    Route::get('/templatelist', 'MailablesController@index')->name('templatelist');
    Route::get('/new', 'MailablesController@create')->name('templatecreate');
    Route::post('/create', 'MailablesController@store')->name('templatestore');
    Route::get('/edit/{id}', 'MailablesController@edit')->name('templateedit');
    Route::post('/update/{id}', 'MailablesController@update')->name('templateupdate');
    Route::post('/upload', 'MailablesController@upload')->name('templateupload');
	Route::get('/destroy/{id}', 'MailablesController@destroy')->name('templatedestroy');
	Route::get('/active/{id}', 'MailablesController@active')->name('templateactive');
    Route::get('/inactive/{id}', 'MailablesController@inactive')->name('templateinactive');
   
});
