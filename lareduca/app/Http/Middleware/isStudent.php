<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RoleUser;

class isStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Auth::user()->id;
        $studentId = 3;
        $isStudent = RoleUser::where('user_id', $userId)->where('role_id', $studentId)->first();

        if ($isStudent == null) return abort(403, 'Access denied. You must be a student to view this page.');

        if (Auth::check() && $userId == $isStudent->role_id) return $next($request);
    }
}
