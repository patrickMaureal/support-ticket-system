<x-app-layout>

	<div class="pagetitle">
		<h1>Profile</h1>
	</div><!-- End Page Title -->

	<section class="section profile">
		<div class="row">
			<div class="col-xl-4">

				<div class="card">
					<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

						<img src="{{ asset('img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
						<h2>Kevin Anderson</h2>
						<h3>Web Designer</h3>
						<div class="social-links mt-2">
							<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
							<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
							<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
							<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
						</div>
					</div>
				</div>

			</div>

			<div class="col-xl-8">

				<div class="card">
					<div class="card-body pt-3">
						<!-- Bordered Tabs -->
						<ul class="nav nav-tabs nav-tabs-bordered">

							<li class="nav-item">
								<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
							</li>

						</ul>
						<div class="tab-content pt-2">

							<div class="tab-pane fade show active profile-overview" id="profile-overview">
								<h5 class="card-title">About</h5>
								<p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

								<h5 class="card-title">Profile Details</h5>

								<div class="row">
									<div class="col-lg-3 col-md-4 label ">Full Name</div>
									<div class="col-lg-9 col-md-8">Kevin Anderson</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Email</div>
									<div class="col-lg-9 col-md-8">k.anderson@example.com</div>
								</div>

							</div>

							@include('profile.partials.update-profile-information-form')

							@include('profile.partials.update-password-form')

						</div><!-- End Bordered Tabs -->

					</div>
				</div>

			</div>
		</div>
	</section>

</x-app-layout>
