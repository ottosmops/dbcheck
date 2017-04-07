# db:check (analyze invalid foreign keys)

[![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.md)
[![Packagist Downloads](https://img.shields.io/packagist/dt/ottosmops/dbcheck.svg?style=flat-square)](https://packagist.org/packages/ottosmops/dbcheck)

This package adds a ```db:check``` command to a laravel instance, which checks for invalid foreign keys in the database (mysql). It implements this [stored procedure](http://stackoverflow.com/questions/2250775/force-innodb-to-recheck-foreign-keys-on-a-table-tables).

## Install

Via Composer

``` bash
$ composer require 'ottosmops/dbcheck:1.*'
```

Add ```Ottosmops\Dbcheck\DbcheckServiceProvider::class,``` to the providers-array in ```config/app.php```.

## Usage

``` php
php artisan db:check 
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.