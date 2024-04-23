<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RoleUser;

class isTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Auth::user()->id;
        $teacherId = 2;
        $isTeacher = RoleUser::where('user_id', $userId)->where('role_id', $teacherId)->first();

        if ($isTeacher == null) return abort(403, 'Access denied. You must be a teacher to view this page.');

        if (Auth::check() && $userId == $isTeacher->role_id) return $next($request);
    }
}
