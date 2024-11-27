<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Visitor;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Log visitor
        Visitor::create(['ip_address' => Request::ip()]);

        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
