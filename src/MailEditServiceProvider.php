<?php

namespace Mailcct\Mailablecct;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class MailEditServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/./../resources/views','mailable');

        $this->loadMigrationsFrom(__DIR__.'./../database/migrations');
       
        $this->publishes([
        __DIR__.'/./../resources/views' => resource_path('views/mailable/'),
        'views']);

        $this->publishes([
        __DIR__.'/./../public/' => public_path('vendor/maileclipse/'),
        'css']);
        
        $this->mergeConfigFrom(__DIR__.'/../config/mailcct.php', 'mailcct');

        $this->app['router']->namespace('Mailcct\Mailablecct\Http\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/mailable.php');
                });

        $this->loadTranslationsFrom(__DIR__.'/./../resources/lang', 'mailablelang');

    }
    public function register()
    {
        
    }
    
}


   
