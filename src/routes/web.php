<?php

Route::group(['prefix' => 'chatteradmin',  'middleware' => ['web','auth']], function()
{
  Route::get('/', 'Codiiv\Chatter\Controllers\ChatterController@loadAdmin')->name("admin");
  Route::get('/{page}', 'Codiiv\Chatter\Controllers\ChatterController@loadPage')->name("installadmin");

  Route::post('categories', 'Codiiv\Chatter\Controllers\ChatterController@insertCategory')->name("insert.category");
  Route::post('delete/category', 'Codiiv\Chatter\Controllers\ChatterController@deleteCategory')->name("delete.category");
});
