<?php namespace Angel\Modals;

use View;

class Modal extends \Angel\Core\LinkableModel {

	public static function columns()
	{
		return array(
			'name',
			'html'
		);
	}

	public function validate_rules()
	{
		return array(
			'name' => 'required'
		);
	}

	///////////////////////////////////////////////
	//                  Events                   //
	///////////////////////////////////////////////
	public static function boot()
	{
		parent::boot();

		static::saving(function($modal) {
			$modal->plaintext = strip_tags($modal->html);
		});
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
	public function search($terms)
	{
		return static::where(function($query) use ($terms) {
			foreach ($terms as $term) {
				$query->orWhere('name',      'like', $term);
				$query->orWhere('plaintext', 'like', $term);
			}
		})->get();
	}

	///////////////////////////////////////////////
	//                View-Related               //
	///////////////////////////////////////////////
	public function render()
	{
		return View::make('modals::admin.modals.render', array('modal' => $this));
	}
}