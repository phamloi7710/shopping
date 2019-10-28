<?php

namespace LoiPham\WooCommerce\App\Http\Controllers\Admin;
use Assets;
use LoiPham\WooCommerce\App\Http\Controllers\Controller;
class LanguageController extends Controller
{
    public function index()
    {
        page_title()->setTitle(__('woo-commerce::title.management', ['attribute' => __('woo-commerce::title.language')]));
//        dd(config('assets.resources'));
        Assets::addScripts(['select2'])->addStyles(['select2', 'select2bs4']);
        return view('woo-commerce::admin.pages.language.index');
    }
}
