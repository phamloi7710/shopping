<?php

namespace LoiPham\WooCommerce\Facades;

use LoiPham\WooCommerce\Supports\DashboardMenu;
use Illuminate\Support\Facades\Facade;

class DashboardMenuFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {

        return DashboardMenu::class;
    }
}
