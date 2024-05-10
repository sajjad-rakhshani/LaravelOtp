<?php
namespace LaravelOtp\Providers;
use Illuminate\Support\ServiceProvider;

class OtpServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'laravel-otp-migrations');
    }
}
