This is a module for the [Angel CMS](https://github.com/JVMartin/angel).

Installation
------------
Add the following requirements to your `composer.json` file:
```javascript
"require": {
    "angel/modals": "dev-master"
},
```

Issue a `composer update` to install the package.

Add the following service provider to your `providers` array in `app/config/app.php`:
```php
'Angel\Modals\ModalsServiceProvider'
```

Issue the following command:
```bash
php artisan migrate --package="angel/modals"   # Run the migrations
```

Finally, open up your `app/config/packages/angel/core/config.php` and add the module to the `menu` array:
```php
'menu' => array(
	'Pages'    => 'pages',
	'Menus'    => 'menus',
	'Modals'   => 'modals', // <--- Add this line
	'Users'    => 'users',
	'Settings' => 'settings'
),
```
