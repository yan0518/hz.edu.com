<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->menu = [];
            $group = Auth::user()->group;
            //可数据库维护
            if($group == 1){
                //admin
                $menus = config('adminlte.menu');
            }
            else{
                //general user
                $menus = config('adminlte.custom.menu');
            }
            $event->menu->add(...$menus);
        });
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
