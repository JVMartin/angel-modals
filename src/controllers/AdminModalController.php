<?php namespace Angel\Modals;

use Angel\Core\AdminCrudController;

class AdminModalController extends AdminCrudController {

	protected $model	= 'Modal';
	protected $uri		= 'modals';
	protected $plural	= 'modals';
	protected $singular	= 'modal';
	protected $package	= 'modals';

	public function index()
	{
		return $this->index_searchable(array('name', 'html'));
	}

	public function validate_rules($id = null)
	{
		return array(
			'name' => 'required'
		);
	}

}