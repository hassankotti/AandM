<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\Cart;
use App\Model\Category;
use Illuminate\Routing\Route;
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

                $cart = Auth::check()? Cart::where('user_id', Auth::user()->id)->get():0;
                $cartCount = Auth::check() ? Count($cart) : 0;
                $view->with(['myCartCount' => $cartCount, 'categoreis' => Category::all()]);
            }
        );
    }
}