<?php
namespace SajjadRakhshani\LaravelOtp;
use Illuminate\Support\ServiceProvider;
use SajjadRakhshani\IrSmsGates\Gateways\IpPanel;
use SajjadRakhshani\IrSmsGates\Gateways\Log;
use SajjadRakhshani\IrSmsGates\Gateways\MeliPayamak;

class OtpServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind('SajjadRakhshani\\IrSmsGates\\Gateways\\Log', function (){
            return new Log(config('laravel-otp.log.file'));
        });
        $this->app->bind('SajjadRakhshani\\IrSmsGates\\Gateways\\MeliPayamak', function (){
            return new MeliPayamak(config('laravel-otp.melipayamak.username'), config('laravel-otp.melipayamak.password'));
        });
        $this->app->bind('SajjadRakhshani\\IrSmsGates\\Gateways\\IpPanel', function (){
            return (new IpPanel(config('laravel-otp.ippanel.api_key')))->from(config('laravel-otp.ippanel.from'));
        });
        $this->app->bind('SajjadRakhshani\\IrSmsGates\\Gateways\\SmsIr', function (){
            return (new IpPanel(config('laravel-otp.smsir.api_key')));
        });
    }

    public function boot() : void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations')
        ], 'laravel-otp-migrations');
        $this->publishes([
            __DIR__.'/config' => config_path()
        ], 'laravel-assets');
    }
}
