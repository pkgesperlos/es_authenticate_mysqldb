<?php

namespace Esperlos\Esauthentication\Providers;

use Illuminate\Support\ServiceProvider;

class EsAuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../../config/esauthentication.php' => config_path('esauthentication.php'),
          ],'config');

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');

    }
}
