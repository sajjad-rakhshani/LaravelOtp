# LaravelOtp
LaravelOtp is a laravel package to send otp codes to user.
## installation
use the composer to install LaravelOtp.
```bash
composer require sajjad-rakhshani/LaravelOtp
```
then add your details in config/laravel-otp.php
## usage
### send otp
```php
LaravelOtp\Otp::saveAndSend('09362938792');
```
send otp code to this phone
