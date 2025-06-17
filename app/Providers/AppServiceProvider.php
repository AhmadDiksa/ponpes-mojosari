<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\ProgramComposer;
use App\Models\Footer;

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
        //
        View::composer('components.header', ProgramComposer::class);
        View::composer('layouts.app', function ($view) {
            $view->with('footer', Footer::first());
        });
    }
}
