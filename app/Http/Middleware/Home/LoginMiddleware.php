<?php

namespace App\Http\Middleware\Home;

use Closure;

class LoginMiddleware
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
        if (session('name')) {
            // 执行下一次请求 通过
            return $next($request);
        }else{
            // 跳转到登录页面
            return redirect('/home/login')->with('error','请先登录');
            // return 6;
             // return '6666';
        }
        // if ($this->auth->guest()) {
        //     if ($request->ajax()) {
        //         return redirect()->guest('/home/login');
        //     } else {
        //         return redirect()->guest('/home/login');
        //     }
        // }

        // return $next($request);



    }
}
