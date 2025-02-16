 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

	<div class="d-flex align-items-center justify-content-between">
		<a href="index.html" class="logo d-flex align-items-center">
			<img src="{{ asset('img/logo.png') }}" alt="">
			<span class="d-none d-lg-block">NiceAdmin</span>
		</a>
		<i class="bi bi-list toggle-sidebar-btn"></i>
	</div><!-- End Logo -->

	<nav class="header-nav ms-auto">
		<ul class="d-flex align-items-center">

			<li class="nav-item dropdown pe-3">

				<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
					<img src="{{ asset('img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
					<span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
				</a><!-- End Profile Iamge Icon -->

				<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
					<li class="dropdown-header">
						<h6>Kevin Anderson</h6>
						<span>Web Designer</span>
					</li>

					<li>
						<hr class="dropdown-divider">
					</li>

					<li>
						<a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
							<i class="bi bi-gear"></i>
							<span>Account Settings</span>
						</a>
					</li>

					<li>
						<hr class="dropdown-divider">
					</li>

					<form class="logout-form" action="{{ route('logout') }}" method="POST" >
						@csrf
						<li>
							<a class="logout dropdown-item d-flex align-items-center" href="">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>
					</form>

				</ul><!-- End Profile Dropdown Items -->
			</li><!-- End Profile Nav -->

		</ul>
	</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

@push('scripts')
 <script type="text/javascript" src="{{ asset('js/page/navbar/index.js') }}"></script>
@endpush
