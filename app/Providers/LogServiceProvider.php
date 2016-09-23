<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DatabaseLogger\UniLogger;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //dd(app_path());
        $this->app->bind("App\\DatabaseLogger\\UniLogger", function(){
            $mono = new MonologLogger("uniloger");
            $handler = new StreamHandler(storage_path().'/logs/laravel.log', MonologLogger::DEBUG);
            $formatter = new LineFormatter(null, null, false, true);
            $handler->setFormatter($formatter);
            $mono->pushHandler($handler);;
            return new UniLogger($mono, $this->app['events']);
        });
        //
    }
}
