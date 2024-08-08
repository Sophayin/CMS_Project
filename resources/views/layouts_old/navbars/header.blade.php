<?php

use App\Models\Department;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

if (Auth::user()->role_user) {
    $role_id = Auth::user()->role_user->role_id;
} else {
    $role_id = Auth::user()->staff->role_id;
}
$department = Department::where('slug', '/' . Request::segment(1))->first();
?>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{url('/')}}" class="logo d-flex align-items-center">
            <img src="{{url('assets/svg/logo121.png')}}" alt="Phsar121">
            <span class="d-none d-lg-block"></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="search-bar">
        @if($department)
        <?php
        $parent = Department::find($department->id);
        $depart_children = Department::where(['parent_id' => $department->id])
            ->where('type', 'menu')
            ->whereHas('role_permission', function ($query) use ($role_id) {
                $query->where('role_id', $role_id);
            })
            ->orderBy('sort', 'asc')->get();
        ?>
        @if($depart_children)
        <ul class="nav nav-tabs d-flex" role="tablist">
            @foreach($depart_children as $depart)
            <?php $action = $depart->slug == 'user' ? '' : ""; ?>
            <li class="nav-item flex-fill" role="presentation">
                <a class="nav-link {{ strcmp($depart->slug, '/'.Request::path()) ? '' : 'active'}}" href="{{$depart->slug}}" wire:navigate role="tab">
                    <span style="position: relative;top: -1px; right:4px">{!! $depart->icon !!}</span>
                    <span>{{get_translation($depart)}}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        @endif

    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon-->
            <li class="nav-item d-flex">
                <livewire:Component.SwitchLanguage />
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <?php $notifications = Notification::orderBy('created_at', 'DESC'); ?>
                    <span class="badge bg-primary badge-number">
                        {{$notifications->where('is_read', false)->whereMonth('created_at', date('m'))->count()}}
                    </span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        @if($notifications->where('is_read', false)->count())
                        {{__('You have')}} {{$notifications->where('is_read', false)->count()}} {{__('new notifications')}}
                        <a href="{{route('notification')}}" wire:navigate><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        @else

                        <span>{{__("Empty")}}</span>
                        @endif
                    </li>

                    @foreach($notifications->take(6)->get() as $notify)
                    <li class="notification-item mb-2">
                        <i>
                            <img width="35" class="rounded-circle" src="{{staff_profile($notify->agency->agency_profile ?? '')}}">
                        </i>
                        <div>
                            <h6 class="mb-0">{{$notify->title}}</h6>
                            <p>{{$notify->description}}</p>
                            <p>{{$notify->created_at->diffForHumans(['parts' => 4, 'join' => ' ', 'short' => true])}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul><!-- End Notification Dropdown Items -->
            </li><!-- End Notification Nav -->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ staff_profile(Auth::user()->profile) }}" class="rounded-circle" style="border:solid transparent;" alt="{{Auth::user()->name}}">
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{Auth::user()->name}}</h6>
                        <span>{{Auth::user()->staff->role->name ?? ""}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('user-profile',Auth::user()->id)}}">
                            <i class="bi bi-person"></i>
                            <span>{{__('My Profile')}}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <livewire:Auth.logout />
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header>