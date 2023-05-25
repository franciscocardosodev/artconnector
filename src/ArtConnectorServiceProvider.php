<?php

use Illuminate\Support\ServiceProvider;


class ArtConnectorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/art_connector.php' => config_path('art_connector.php'),
        ],'config');
    }

    public function register()
    {
        
    }

}
