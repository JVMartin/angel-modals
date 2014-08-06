<?php namespace Angel\Modals;

use Angel\Core\LinkableModel;
use View, App;

class Modal extends LinkableModel {

	protected $softDelete = true;

	public function changes()
	{
		$Change = App::make('Change');

		return $Change::where('fmodel', 'Modal')
			->where('fid', $this->id)
			->with('user')
			->orderBy('created_at', 'DESC')
			->get();
	}

	// Handling relationships in controller CRUD methods
	public function pre_hard_delete()
	{
		parent::pre_hard_delete();
		$Change = App::make('Change');
		$Change::where('fmodel', 'Modal')
			->where('fid', $this->id)
			->delete();
	}

	///////////////////////////////////////////////
	//               Menu Linkable               //
	///////////////////////////////////////////////
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