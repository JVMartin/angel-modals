Installation
------------
Add the following requirements to your `composer.json` file:
```javascript
"require": {
    "angel/modals": "dev-master"
},
```

After installing the dependencies, add the following to your Service Providers in `app/config/app.php`:
```
'Angel\Modals\ModalsServiceProvider'
```

Finally, issue the following commands:
```
php artisan migrate --package="angel/modals"   # Run the migrations
```
