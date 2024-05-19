# LaravelOtp
LaravelOtp is a laravel package to send otp codes to user.
## installation
use the composer to install LaravelOtp.
```bash
composer require sajjad-rakhshani/LaravelOtp
```
after package installation add the OtpServiceProvider to your app providers.

in laravel 11 : bootstrap/providers.php

in laravel 10 : config/app.php => providers
```php
    \LaravelOtp\Providers\OtpServiceProvider::class
```
publish config file : 
```bash
php artisan vendor:publish --tag=laravel-otp-config
```
then specify your details in published file
## usage
### send otp
```php
LaravelOtp\Otp::sendOtp('09362938792');
```
send otp code to this phone
