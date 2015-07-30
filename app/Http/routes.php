<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('uses'=>'PagesController@index','as'=>'tnr.index'));
Route::get('/{type}', array('uses'=>'PagesController@type','as'=>'tnr.article'));

Route::get('/json/{type}', array('uses'=>'PagesController@articleByJson','as'=>'tnr.json.by.type'));
Route::get('/{type}/{slug}', array('uses'=>'PagesController@show','as'=>'tnr.show'));
Route::post('/comment/create',array("uses"=>"CommentController@create","as"=>"tnr.commentCreate"));
