<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checklogindetail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
           
        if(Auth::check()==true){
           return $next($request);
        }else{
           return  redirect()->route('dangnhap')->with('notlogin','Bạn chưa đăng nhập để xem chi tiết');
        }
    }
}
