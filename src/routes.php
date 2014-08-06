<?php

Route::group(array('prefix'=>admin_uri('modals'), 'before'=>'admin'), function() {

	$controller = 'AdminModalController';

	Route::get('/', array(
		'uses' => $controller . '@index'
	));
	Route::get('add', array(
		'uses' => $controller . '@add'
	));
	Route::post('add', array(
		'before' => 'csrf',
		'uses' => $controller . '@attempt_add'
	));
	Route::get('edit/{id}', array(
		'uses' => $controller . '@edit'
	));
	Route::post('edit/{id}', array(
		'before' => 'csrf',
		'uses' => $controller . '@attempt_edit'
	));
	Route::post('delete/{id}', array(
		'before' => 'csrf',
		'uses' => $controller . '@delete'
	));
});