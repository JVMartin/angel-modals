<?php namespace Angel\Modals;

use Illuminate\Support\ServiceProvider;
use Config;

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


		$bindings = array(
			// Models
			'Modal'                => '\Angel\Modals\Modal',

			// Controllers
			'AdminModalController' => '\Angel\Modals\AdminModalController'
		);

		foreach ($bindings as $name=>$class) {
			$this->app->singleton($name, function() use ($class) {
				return new $class;
			});
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
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
