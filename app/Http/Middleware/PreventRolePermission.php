<?php

namespace App\Http\Middleware;

use App\Models\Department;
use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PreventRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role_user) {
            $role_id = Auth::user()->role_user->role_id;
        } else {
            $role_id = Auth::user()->staff->role_id;
        }
        $getDepartment = Department::whereHas('role_permission', function ($q) use ($role_id) {
            $q->where('role_id', $role_id);
        })->with('recursive_agency')
            ->pluck('slug')->toArray();
        array_push($getDepartment, "/");

        if ($request->path() == '/') {
            $current_url = '/';
        } else {
            $current_url = "/" . $request->path();
        }
        $getDepartment = array_unique($getDepartment);

        //dd($getDepartment);
        //if (in_array($current_url, $getDepartment)) {
            return $next($request);
        //} else {
        //    return response(view('livewire.errors.403'));
        //}
    }
}
