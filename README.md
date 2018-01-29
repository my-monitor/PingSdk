# PingSdk

this is a simple package to use uptime service in [MyMonitor/Servers-Mointor](https://google.com) project

## Installation

You can install this package via composer using this command:
```
composer require my-monitor/ping-sdk
```

then in `app.php` provideres array add service provider
```
    //
    MyMonitor\PingSdk\PingSdkServiceProvider::class,
```

You can publish the config-file with:

```
php artisan vendor:publish --provider="MyMonitor\PingSdk\PingSdkServiceProvider::class"
```

This is the contents of the published config file:

```php
<?php

return [
    'api_endpoint' => env('PINGSDK_API_ENDPOINT',null),
    'api_token' => env('PINGSDK_API_TOKEN',null),
];
```

## Lumen Support
Lumen configuration is slightly more involved but features and API are identical to Laravel.

Install using this command:
```
composer require my-monitor/ping-sdk
```
Uncomment the following lines in the bootstrap file or add them if missing:
```php
// bootstrap/app.php:
$app->withFacades();
$app->withEloquent();
```

Configure the pacakge service provider
```php
// bootstrap/app.php:
$app->register(MyMonitor\PingSdk\PingSdkServiceProvider::class);
```

Finally, update boostrap/app.php to load the config file:
```php
// bootstrap/app.php
$app->configure('mymonitor-ping');
```


## Credits

- [Ahmed Ashraf](https://github.com/ahmedash95)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.