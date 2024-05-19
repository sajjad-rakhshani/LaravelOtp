<?php
namespace LaravelOtp\Providers;
use Illuminate\Support\ServiceProvider;
use IrSmsGates\Gateways\IpPanel;
use IrSmsGates\Gateways\Log;
use IrSmsGates\Gateways\MeliPayamak;

class OtpServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind('IrSmsGates\Gateways\Log', function (){
            return new Log(config('laravel-otp.log.file'));
        });
        $this->app->bind('IrSmsGates\Gateways\MeliPayamak', function (){
            return new MeliPayamak(config('laravel-otp.melipayamak.username'), config('laravel-otp.melipayamak.password'));
        });
        $this->app->bind('IrSmsGates\Gateways\IpPanel', function (){
            return (new IpPanel(config('laravel-otp.ippanel.api_key')))->from(config('laravel-otp.ippanel.from'));
        });
    }

    public function boot() : void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'laravel-otp-migrations');
        $this->publishes([
            __DIR__.'/../config' => config_path()
        ], 'laravel-otp-config');
    }
}
