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

#Installing PDO Firebird extension on an Ubuntu server

```cmd
sudo apt-get install php5-dev firebird2.5-dev php-pear devscripts debget
sudo ln -s /usr/include/php5 /usr/include/php
```

Install all the build dependencies for php source. And link the php source includes to ./php for the php source to find.

```cmd
wget -O php-5.5.17.tar.gz http://au1.php.net/get/php-5.5.17.tar.gz/from/this/mirror
tar -zxvf php-5.5.17.tar.gz
cd php-5.5.17/ext/pdo_firebird/
```

Download the php source code. Extract and cd into the pdo firebird extension folder. 

Note: Replace 5.5.17 with the latest version

```cmd
phpize
./configure
make
sudo make install 
```

Build and install the extension.

```cmd
sudo vi /etc/php5/cli/conf.d/20-pdo_firebird.ini
```

Add a config file for the pdo extension

```text
; configuration for php Firebird module
; priority=20
extension=pdo_firebird.so
```

Insert the extension enablement.

```cmd
php -i | grep PDO
```

To check if Firebird is enabled.
