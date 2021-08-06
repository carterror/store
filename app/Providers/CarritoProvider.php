<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Carrito;

class CarritoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer("*", function($view)
        {
            $carrito_id = request()->session()->get('carrito_id');

            $carrito = Carrito::findOrCreateBySessionId($carrito_id);
            
            if (!$carrito) {
                $carrito = Carrito::findOrCreateBySessionId(null);
            }

            request()->session()->put('carrito_id', $carrito->id);
        
            $view->with('carrito', $carrito);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
