@php
$currentRoute = Route::currentRouteName();
@endphp
<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('index')}}"><img class="img-fluid for-light" src="{{ $setting['logo'] }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/admin/images/logo/logo_dark.png') }}" alt=""></a>
			<!-- <div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div> -->
		</div>
		<div class="logo-icon-wrapper"><a href="{{route('index')}}"><img class="img-fluid" src="{{ asset('assets/admin/images/logo/logo-icon.png') }}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li></li>
					<li class="sidebar-main-title sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" href="{{route('index')}}">
							<i data-feather="file-text"> </i><span>Dashboard</span>
						</a>
					</li>






					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Str::startsWith($currentRoute, 'blogs.') ? 'active' : '' }}" href="javascript:;">
							<i data-feather="bold"></i><span>Blog </span>
							<div class="according-menu"><i class="fa fa-angle-{{ Str::startsWith($currentRoute, 'blogs.') ? 'down' : 'right' }}"></i></div>
						</a>

						<ul class="sidebar-submenu " style="display: {{ (request()->route()->getPrefix() == 'blogs') ? 'block' : 'none' }} ;">
							<li><a href="{{route('blogs.index')}}" class="{{ Str::startsWith($currentRoute, 'blogs.') ? 'active' : '' }}">View</a></li>
							<li><a href="{{route('admin.blogs.category')}}" class="{{ Route::currentRouteName() == 'admin.blogs.category' ? 'active' : '' }}">Categories</a></li>
						</ul>
					</li>


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Str::startsWith($currentRoute, 'inquiries') ? 'active' : '' }}" href="{{route('inquiries.list')}}">
							<i data-feather="user"> </i><span>Inquiries </span>
						</a>
					</li>

					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Str::startsWith($currentRoute, 'newsletters') ? 'active' : '' }}" href="{{route('newsletters.list')}}">
							<i data-feather="user"> </i><span>Newsletters </span>
						</a>
					</li>




					{{--<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/project' ? 'active' : '' }}" href="#">
					<i data-feather="box"></i><span>Pages </span>
					<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/project' ? 'down' : 'right' }}"></i></div>
					</a>
					<ul class="sidebar-submenu">
						<li><a href="{{ route('admin_home') }}" class="{{ Route::currentRouteName() == 'admin_home' ? 'active' : '' }}">Home</a></li>
						<li><a href="{{route('admin_about')}}" class="{{ Route::currentRouteName() == 'admin_about' ? 'active' : '' }}">About</a></li>
					</ul>
					</li> --}}
					<!-- <li class="sidebar-list">
					<a class="sidebar-link sidebar-title link-nav" href="{{route('index')}}">
						<i data-feather="user"> </i><span>Users</span>
					</a>
				</li> -->
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'settings' ? 'active' : '' }} " href="{{route('settings')}}">
							<i data-feather="settings"> </i><span>Setting</span>
						</a>
					</li>

					{{-- <li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Str::startsWith($currentRoute, 'bookings.') ? 'active' : '' }}" href="{{route('bookings.index')}}">
					<i data-feather="calendar"> </i><span>Bookings</span>
					</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Str::startsWith($currentRoute, 'galleries.') ? 'active' : '' }}" href="{{route('galleries.index')}}">
							<i data-feather="calendar"> </i><span>Gallery</span>
						</a>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav {{ Str::startsWith($currentRoute, 'services.') ? 'active' : '' }}" href="{{route('services.index')}}">
							<i data-feather="list"> </i><span>Services</span>
						</a>
					</li>--}}
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>