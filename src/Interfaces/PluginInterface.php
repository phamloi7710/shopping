<?php

namespace LoiPham\WooCommerce\Interfaces;

interface PluginInterface
{

    /**
     * @author Sang Nguyen
     */
    public static function activate();

    /**
     * @author Sang Nguyen
     */
    public static function deactivate();

    /**
     * @author Sang Nguyen
     */
    public static function remove();
}
