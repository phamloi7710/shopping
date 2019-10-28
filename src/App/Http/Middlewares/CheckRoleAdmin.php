<?php

namespace LoiPham\WooCommerce\App\Http\Middlewares;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRoleAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::guard('woo')->check())
        {
            return $next($request);
        }
        $notifySuccess = array(
            'message' => 'Không thể phân quyền',
            'alert-type' => 'error',
        );
        return redirect()->route('getCheckUsername')->with($notifySuccess);
    }
}
