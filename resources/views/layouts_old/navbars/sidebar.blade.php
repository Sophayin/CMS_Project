<?php

use App\Models\Department;

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
        <?php $children = Department::where('parent_id', $depart->id)->whereHas('role_permission', function ($q) use ($role_id) {
            $q->where("role_id", $role_id);
        })->first(); ?>
        <li class="nav-item">
            <a class="nav-link {{ strcmp($depart->slug, '/' . Request::segment(1)) ? 'collapsed' : '' }}" @if(Request::is('/')) href="{{$children->slug ?? ''}}" @else wire:navigate href="{{$children->slug ?? ''}}" @endif>
                <div style="width:19px; margin-right:12px;">
                    <span style="position: relative;top: -2px;">{!! $depart->icon !!}</span>
                </div>
                <span>{{get_translation($depart)}} </span>
            </a>
        </li>
        @endforeach
    </ul>
</aside>