<?php

use Illuminate\Support\ServiceProvider;


class ArtsoftConnectorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/artsoft_connector.php' => config_path('artsoft_connector.php'),
        ],'config');
    }

    public function register()
    {
        
    }

}
