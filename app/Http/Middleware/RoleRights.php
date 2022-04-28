<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Auth;

class RoleRights
{
    public function handle(Request $request, Closure $next, $modelName)
    {
        $user = Auth::user();
        $model = $request->route($modelName);
        // dd($model->isUserHasRights($request->method(), $user));
        if ($model == null || $user->isAdmin() || $model->isUserHasRights($request->method(), $user)) {
            return $next($request);
        }
        return back()->with([
            'success' => 'Недостаточно прав.'
        ]);
    }
}
