<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        View::composer('layouts.navigation', function ($view) {
            $cartCount = app(CartController::class)->cartCount();
            $view->with('cartCount', $cartCount);
        });
    }
}
