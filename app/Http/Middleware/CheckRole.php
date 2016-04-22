<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 4/22/16
 * Time: 04:02
 */

namespace app\Http\Middleware;
use Closure;

class CheckRole{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = $this->getRequiredRoleForRoute($request->route());
        if ($request->user()->hasRole($roles) || !$roles) {
            return $next($request);
        }
         /*return response([
         	'error' => [
         		'code' => 'INSUFFICIENT_ROLE',
         		'description' => trans('user.insufficient_role')
         	]
         ], 401);*/

        return redirect('/');
    }
    /**
     *Gets the roles required by the route.
     *
     * @param string/array $route array of strings or string with the name of the required role
     *
     * @return bool
     */
    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}