<?php
namespace LaravelOtp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;
use IrSmsGates\Gateways\IpPanel;
use IrSmsGates\Gateways\MeliPayamak;
use PHPUnit\Framework\Constraint\IsInstanceOf;

class Otp extends Facade
{
    protected static function getFacadeAccessor() : string
    {
        return "IrSmsGates\\Gateways\\" . config('laravel-otp.gateway');
    }

    public static function save(string $mobile) : int
    {
        $config = config('laravel-otp');
        $digits = $config['digits'];
        $code = mt_rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        try {
            DB::table('laravel_otp_codes')->upsert([
                'mobile' => $mobile,
                'code' => bcrypt($code),
                'expire' => now()->addSeconds($config['expire'])
            ], 'mobile');
            return $code;
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
        return 0;
    }

    private static function setText($code)
    {
        $class = self::getFacadeRoot();
        if ($class instanceof IpPanel) self::text(['code' => $code]);
        elseif ($class instanceof MeliPayamak) self::text([$code]);
        return $class;
    }

    /**
     * save and send otp code to user
     */
    public static function saveAndSend(string $mobile) : bool
    {
        $config = config('laravel-otp');
        $code = self::save($mobile);
        if ($code == 0) return false;
        return self::setText($code)->to($mobile)->pattern($config['patterns']['otp-code'])->send();
    }
}
