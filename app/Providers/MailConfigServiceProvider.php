<?php

namespace App\Providers;

use Config;
use Illuminate\Support\Facades\Route;
/*use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;*/
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider  extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

       // parent::boot();
    }

    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
            

    }
        
}
