<?php

namespace Mailcct\Mailablecct;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class MailEditServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //load view file
        $this->loadViewsFrom(__DIR__.'/./../resources/views','mailable');

        // load migration 

        $this->loadMigrationsFrom(__DIR__.'./../database/migrations');
       
        $this->mergeConfigFrom(__DIR__.'/../config/mailcct.php', 'mailcct');

        $this->app['router']->namespace('Mailcct\Mailablecct\Http\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/mailable.php');
                });

        $this->loadTranslationsFrom(__DIR__.'/./../resources/lang', 'mailablelang');

        $this->publishes([
        __DIR__.'/./../resources/views' => resource_path('views/vendor/mailable/'),
        'views']);

        $this->publishes([
        __DIR__.'/./../public/' => public_path('mailable/'),
        'css']);

    }
    public function register()
    {
        
    }
    
}


   
