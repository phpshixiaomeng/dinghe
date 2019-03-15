<?php

namespace App\Http\Middleware;

use Closure;

class RbacMiddleware
{
    public static function  getControllerAndFunction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        $class = substr(strrchr($class,'\\'),1);
        return ['controller' => $class, 'method' => $method];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('level')==1){
             return $next($request);
        }
        $admin_node_type = session('admin_node_type');
        $keys = array_keys($admin_node_type);
        $came_aname = self::getControllerAndFunction();
        $cname = strtolower($came_aname['controller']);
        $aname = strtolower($came_aname['method']);
        if(!in_array($cname,$keys)){
            dd('没有权限');
        }
        if(!in_array($aname,$admin_node_type[$cname])){
            dd('没有权限');
        }
        return $next($request);
    }
}
