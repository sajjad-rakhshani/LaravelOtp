<?php
namespace LaravelOtp;
use Illuminate\Support\Facades\Facade;
class Otp extends Facade
{
    protected static function getFacadeAccessor() : string
    {
        return "IrSmsGates\\Gateways\\" . env('OtpGateway', 'Log');
    }

    /**
     * send otp code to user, create user if not exists.
     */
    public static function sendOtp(string $mobile) : bool
    {
    }
}
