<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('impersonating', function(){
            if(!auth()->check()){
                return ;
            }
                return session()->has('impersonate');
        });

        Blade::if('admin', function(){
            if(!auth()->check()){
                return ;
            }
                return auth()->user()->hasRole('admin');
        });
        
        Blade::if('moderator', function(){
            if(!auth()->check()){
                return ;
            }
                return auth()->user()->hasRole('moderator');
        });

        // Blade::if('subscribed', function(){
        //     return true;
        // });

        // Blade::if('', function(){
        //     return true;
        // });

        // Blade::if('', function(){
        //     return true;
        // });
    }
}
