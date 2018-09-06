<?php

namespace App\Listeners;

use App\Events\BuildingMenu;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class BuildingMenuListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BuildingMenu  $event
     * @return void
     */
    public function handle(BuildingMenu $event)
    {
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
        $event->menu->remove();
        $event->menu->add(...$menus);
    }
}
