<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('tickets.*') ? '' : 'collapsed' }}" href="{{ route('tickets.index') }}">
				<i class="bi bi-ticket-perforated"></i>
				<span>Tickets</span>
			</a>
		</li><!-- End Tickets Page Nav -->

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('categories.*') ? '' : 'collapsed' }}" href="{{ route('categories.index') }}">
				<i class="bi bi-collection"></i>
				<span>Categories</span>
			</a>
		</li><!-- End Category Nav -->

	</ul>

</aside><!-- End Sidebar-->
