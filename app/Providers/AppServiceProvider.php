<?php

namespace App\Providers;

use App\Models\Lang;
use App\Models\Module;
use App\Models\Cart;
use App\Models\Page;
use App\Models\CartSet;
use App\Models\WishList;
use App\Models\WishListSet;
use App\Models\Promocode;
use App\Models\ProductCategory;
use App\Models\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        session(['applocale' => Lang::where('lang', 'ro')->first()->lang]);
        $currentLang = Lang::where('lang', \Request::segment(1))->first()->lang ?? session('applocale');
        session(['applocale' => $currentLang]);
        \App::setLocale($currentLang);

        $langForURL = '';
        if ($currentLang != 'ro') {
            $langForURL = $currentLang;
        }

        $seo['title'] = 'boiar.md';
        $seo['description'] = 'boiar.md';
        $seo['keywords'] = 'boiar.md';
        $categoriesMenu = ProductCategory::where('parent_id', 0)->where('active', 1)->orderBy('position', 'asc')->get();
        $collectionsMenu = Collection::orderBy('position', 'asc')->where('active', 1)->get();
        $firstCollection = Collection::orderBy('position', 'asc')->where('active', 1)->first();
        $footerMenus = Page::where('active', 1)->where('on_footer', 1)->orderBy('position', 'asc')->get();
        $headerMenus = Page::where('active', 1)->where('on_header', 1)->orderBy('position', 'asc')->get();

        $this->getUserId();

        View::share('langs', Lang::orderBy('id', 'desc')->get());
        View::share('lang', Lang::where('lang', session('applocale') ?? Lang::first()->lang)->first());
        View::share('menu', Module::where('parent_id', 0)->orderBy('position')->get());
        View::share('urlLang', $langForURL);
        View::share('seo', $seo);
        View::share('categoriesMenu', $categoriesMenu);
        View::share('collectionsMenu', $collectionsMenu);
        View::share('firstCollection', $firstCollection);
        View::share('footerMenus', $footerMenus);
        View::share('headerMenus', $headerMenus);

        View::composer('*', function ($view)
        {
            if(auth('persons')->guest() && isset($_COOKIE['user_id'])) {
              $cartProducts = Cart::where('user_id', $_COOKIE['user_id'])->where('set_id', 0)->orderBy('id', 'desc')->get();
              $cartSets = CartSet::where('user_id', $_COOKIE['user_id'])->orderBy('id', 'desc')->get();
              $wishListProducts = WishList::where('user_id', $_COOKIE['user_id'])->where('set_id', 0)->orderBy('id', 'desc')->get();
              $wishListIds = $wishListProducts->pluck('product_id')->toArray();
              $wishListSets = WishListSet::where('user_id', $_COOKIE['user_id'])->orderBy('id', 'desc')->get();
            } else {
              $cartProducts = Cart::where('user_id', auth('persons')->id())->where('set_id', 0)->orderBy('id', 'desc')->get();
              $cartSets = CartSet::where('user_id', auth('persons')->id())->orderBy('id', 'desc')->get();
              $wishListProducts = WishList::where('user_id', auth('persons')->id())->where('set_id', 0)->orderBy('id', 'desc')->get();
              $wishListIds = $wishListProducts->pluck('product_id')->toArray();
              $wishListSets = WishListSet::where('user_id', auth('persons')->id())->orderBy('id', 'desc')->get();
            }

            $promocode = Promocode::where('id', @$_COOKIE['promocode'])
                                    ->where(function($query){
                                        $query->where('status', 'valid');
                                        $query->orWhere('status', 'partially');
                                    })->first();

            View::share('promocode', $promocode);
            View::share('cartProducts', $cartProducts);
            View::share('cartSets', $cartSets);
            View::share('wishListProducts', $wishListProducts);
            View::share('wishListSets', $wishListSets);
            View::share('wishListIds', $wishListIds);
        });
    }


    public function getUserId()
    {
        $user_id = md5(rand(0, 9999999).date('Ysmsd'));

        if (\Cookie::has('user_id')) {
            $value = \Cookie::get('user_id');
        }else{
            setcookie('user_id', $user_id, time() + 10000000, '/');
            $value = \Cookie::get('user_id');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
