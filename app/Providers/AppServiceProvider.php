<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\ProductType;
use App\Cart;
use Session;
use BillDetail;
use Product;

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
         view()->composer('header',function($view){
                 $Type_product = ProductType::all();
                 $view->with('Type_product',$Type_product);// dat ten '' truyen = $

         });
        view()->composer(['header','page.dathang'],function($view){
              if(Session('cart')){
                    $oldCart = Session::get('cart');
                    $cart = new Cart($oldCart);
                    $view->with(['cart'=>Session::get('cart'),'product_cart'=> $cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
                 }
        });
        view()->composer('quanligiohang',function($view){
                $Product = Product::all();
                $view->with('id', $Product);
        });
    }
}
