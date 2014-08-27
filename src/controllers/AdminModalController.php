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

		$this->data['modal']  = $Modal::find($id);
		$this->data['action'] = 'edit';
		return View::make($this->view('add-or-edit'), $this->data);
	}

	public function before_save(&$modal, &$changes = array())
	{
		$modal->plaintext = strip_tags($modal->html);
	}

}