#laravel-database-extensions

##Class extensions to the database component of Laravel 4

- Support for ODBC
- Support for Firebird
- Model validation based on the Aware bundle from Laravel 3

##config/app.php

```php
'providers' => array(
  	'Illuminati\Database\DatabaseServiceProvider',
),
```

##composer.json

```json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/sagetarian/laravel-database-extensions.git"
    }
],

"require": {
  	"sagetarian/laravel-database-extensions" : "dev-master"
},
```
