<?php

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

if (Auth::user()->role_user) {
    $role_id = Auth::user()->role_user->role_id;
} else {
    $role_id = Auth::user()->staff->role_id;
}

$getDepartment = DB::table("departments")
    ->leftJoin('departments as children', function ($join) {
        $join->on('children.parent_id', '=', 'departments.id');
    })
    ->leftJoin('role_permissions', function ($join) {
        $join->on('role_permissions.department_id', '=', 'departments.id');
    })
    ->where('departments.parent_id', null)
    ->groupBy('departments.id')
    ->select('departments.*')
    ->where('role_id', $role_id)
    ->orderBy('departments.sort', 'asc')
    ->get();
?>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @foreach ($getDepartment as $depart)
        <?php
        $children = Department::where('parent_id', $depart->id)
            ->whereHas('role_permission', function ($q) use ($role_id) {
                $q->where("role_id", $role_id);
            })
            ->get();
        $isParentActive = request()->is(trim($depart->slug, '/') . '/*') || request()->is(trim($depart->slug, '/'));
        $isAnyChildActive = $children->contains(function ($child) {
            return request()->is(trim($child->slug, '/') . '/*') || request()->is(trim($child->slug, '/'));
        });
        $isActive = $isParentActive || $isAnyChildActive;
        ?>
        <li class="nav-item">
            @if ($children->count())
            <a class="nav-link {{ $isActive ? '' : 'collapsed' }}" data-bs-target="#{{ 'department-'.$depart->id }}" data-bs-toggle="collapse" href="#">
                <span style="position: relative;top: -2px;">{!! $depart->icon !!}</span>
                <span>{{ get_translation($depart) }}</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="{{ 'department-'.$depart->id }}" class="nav-content collapse {{ $isActive ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                @foreach ($children as $child)
                <li class="nav-item">
                    <a href="{{ url($child->slug) }}" class="{{ request()->is(trim($child->slug, '/') . '/*') || request()->is(trim($child->slug, '/')) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>{{ get_translation($child) }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</aside>