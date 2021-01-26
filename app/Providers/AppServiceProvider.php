<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\Cart;
use App\Model\Category;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer(
            'layouts.master',
            function ($view) {
                $cart = Cart::where('user_id',Auth::user()->id)->get();
                $view->with(['myCartCount'=> Count($cart), 'categoreis'=>Category::all()]);
            }
        );
    }
}