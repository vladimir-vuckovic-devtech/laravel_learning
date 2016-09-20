<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DatabaseLogger\UniLogger;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

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
            $mono->pushHandler(new StreamHandler(storage_path().'/logs/laravel.log', MonologLogger::WARNING));
            //$mono->warning('Foo');
            //$mono->error('Bar');
            return new UniLogger($mono, $this->app['events']);
        });
        //
    }
}
