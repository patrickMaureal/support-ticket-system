<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
			<a class="nav-link" href="{{ route('dashboard') }}">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->

		<li class="nav-item {{ request()->routeIs('tickets.*') ? 'active' : '' }}">
			<a class="nav-link " href="{{ route('tickets.index') }}">
				<i class="bi bi-ticket-perforated"></i>
				<span>Tickets</span>
			</a>
		</li><!-- End Ticket Nav -->

	</ul>

</aside><!-- End Sidebar-->
