<?php
 
namespace Faiznurullah\Tokopay;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class TokopayServiceProvider extends ServiceProvider
{

    public function boot()
    {
  
        
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'tokopay');

        $this->app->singleton('tokopay', function () {
            return new Tokopay(Config::get('tokopay.tokopay_merchant_id'), Config::get('tokopay.tokopay_secret_key'));
        });
    }
}

