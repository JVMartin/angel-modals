<?php namespace Angel\Modals;

use Illuminate\Support\ServiceProvider;
use App;

class ModalsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('angel/modals');

		include __DIR__ . '../../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//-------------------
		// Models
		//-------------------
		App::bind('Modal', function() {
			return new \Angel\Modals\Modal;
		});

		//-------------------
		// Controllers
		//-------------------
		App::bind('AdminModalController', function() {
			return new \Angel\Modals\AdminModalController;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
