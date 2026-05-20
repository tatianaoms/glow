<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $menus = Menu::with('submenus')
                ->whereNull('parent_id')
                ->orderBy('orden')
                ->get();

            $view->with('menus', $menus);
        });
    }
}
