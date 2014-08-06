<?php namespace Angel\Modals;

use Angel\Core\AdminCrudController;
use App, View;

class AdminModalController extends AdminCrudController {

	protected $Model	= 'Modal';
	protected $uri		= 'modals';
	protected $plural	= 'modals';
	protected $singular	= 'modal';
	protected $package	= 'modals';

	protected $log_changes = true;
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

	public function edit($id)
	{
		$Modal = App::make('Modal');

		$modal = $Modal::withTrashed()->find($id);
		$this->data['modal'] = $modal;
		$this->data['changes'] = $modal->changes();
		$this->data['action'] = 'edit';

		return View::make($this->view('add-or-edit'), $this->data);
	}

}