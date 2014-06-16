<?php

class AdminModalController extends AdminCrudController {

	public $model		= 'Modal';
	public $uri			= 'modals';
	public $sub_uri		= '';
	public $plural		= 'modals';
	public $singular	= 'modal';
	public $package		= 'modals';

	public function index()
	{
		return $this->index_searchable(array(
			'name',
			'html'
		));
	}

	public function validate_rules($id = null)
	{
		return array(
			'name' => 'required'
		);
	}

}