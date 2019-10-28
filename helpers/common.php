<?php

use LoiPham\WooCommerce\Supports\PageTitle;
use LoiPham\WooCommerce\Facades\PageTitleFacade;
use LoiPham\WooCommerce\Facades\DashboardMenuFacade;
if (!function_exists('page_title')) {
    /**
     * @return PageTitle
     */
    function page_title()
    {
        return PageTitleFacade::getFacadeRoot();
    }
}
if (!function_exists('dashboard_menu')) {
    /**
     * @return \LoiPham\WooCommerce\Supports\DashboardMenu
     */
    function dashboard_menu()
    {
        return DashboardMenuFacade::getFacadeRoot();
    }
}
