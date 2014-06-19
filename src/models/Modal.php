<?php namespace Angel\Modals;

use Angel\Core\LinkableModel;
use View;

class Modal extends LinkableModel {

	protected $softDelete = true;

	// Columns to update/insert on edit/add
	public static function columns()
	{
		return array(
			'name',
			'html'
		);
	}

	///////////////////////////////////////////////
	//               Menu Linkable               //
	///////////////////////////////////////////////
	// Menu link related methods - all menu-linkable models must have these
	// NOTE: Always pull models with their languages initially if you plan on using these!
	// Otherwise, you're going to be performing repeated queries.  Naughty.
	public function link()
	{
		return '#modal' . $this->id;
	}
	public function link_edit()
	{
		return admin_url('modals/edit/' . $this->id);
	}

	///////////////////////////////////////////////
	//                View-Related               //
	///////////////////////////////////////////////
	public function render()
	{
		return View::make('modals::admin.modals.render', array('modal' => $this));
	}
}