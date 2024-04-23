<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RoleUser;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Auth::user()->id;
        $adminId = 1;
        $isAdmin = RoleUser::where('user_id', $userId)->where('role_id', $adminId)->first();



        if (Auth::check() && $userId == $isAdmin->role_id) return $next($request);
        return abort(403, 'Access denied. You must be an admin to view this page.');
    }
}
