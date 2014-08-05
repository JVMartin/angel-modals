<?php namespace Angel\Modals;

use Angel\Core\AdminCrudController;

class AdminModalController extends AdminCrudController {

	protected $Model	= 'Modal';
	protected $uri		= 'modals';
	protected $plural	= 'modals';
	protected $singular	= 'modal';
	protected $package	= 'modals';

	protected $searchable = array(
		'name',
		'html'
	);

	// Columns to update on edit/add
	protected static function columns()
	{
		return array(
			'name',
			'html'
		);
	}

	public function validate_rules($id = null)
	{
		return array(
			'name' => 'required'
		);
	}

}