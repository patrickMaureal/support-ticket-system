<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">
		@role('Administrator|Agent')
		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->
		@endrole

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('tickets.*') ? '' : 'collapsed' }}" href="{{ route('tickets.index') }}">
				<i class="bi bi-ticket-perforated"></i>
				<span>Tickets</span>
			</a>
		</li><!-- End Tickets Page Nav -->
	@role('Administrator')
		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('users.*') ? '' : 'collapsed' }}" href="{{ route('users.index') }}">
				<i class="bi bi-person"></i>
				<span>Users Management</span>
			</a>
		</li><!-- End Users Management Page Nav -->

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('categories.*') ? '' : 'collapsed' }}" href="{{ route('categories.index') }}">
				<i class="bi bi-collection"></i>
				<span>Categories</span>
			</a>
		</li><!-- End Category Nav -->

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('labels.*') ? '' : 'collapsed' }}" href="{{ route('labels.index') }}">
				<i class="bi bi-tag"></i>
				<span>Labels</span>
			</a>
		</li><!-- End Label Nav -->
	@endrole

	</ul>

</aside><!-- End Sidebar-->
