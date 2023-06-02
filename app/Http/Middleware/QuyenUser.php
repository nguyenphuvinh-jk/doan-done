<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QuyenUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $quyen = explode('|', $role);
        if (in_array(Auth::user()->getTypeStr(), $quyen)){
            return $next($request);
        }

        Session::flash('message_err','Bạn chưa được cấp quyền này!!');
        return Redirect::back();

    }
}
