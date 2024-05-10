<?php
namespace LaravelOtp;
use Illuminate\Support\Facades\DB;
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
        $digits = env('OtpDigits', 5);
        $code = mt_rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        DB::table('laravel_otp_codes')->upsert([
            'mobile' => $mobile,
            'code' => bcrypt($code),
            'expire' => now()->addSeconds(env('OtpExpire', 120))
        ], 'mobile');
        return self::send($mobile, $code);
    }
}
