<?php

namespace LoiPham\WooCommerce\App\Http\Controllers\Admin;
use Assets;
use LoiPham\WooCommerce\App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    public function getIndex()
    {
//        dd(config('app'));
        page_title()->setTitle(__('woo-commerce::title.index'));
        if (Auth::guard('woo')->check()) {
            return view('woo-commerce::admin.index');
        }
        return redirect()->route('getCheckUsername');
    }
}
