#LaravelOtp

LaravelOtp is a laravel package to send otp codes to user.

##installation

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
###define your sms gateway in .env file
```text
OtpGateway='your gateway'
```
available : Log

default : Log

###define otp code lifetime (in seconds) in .env file
```text
OtpExpire=120
```
default : 120

###define otp code digits in .env file
```text
OtpDigits=5
```
default : 5

##usage

###send otp
```php
LaravelOtp\Otp::sendOtp('09362938792');
```
send otp code to this phone
