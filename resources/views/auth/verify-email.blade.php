<x-guest-layout>
	<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

					<div class="d-flex justify-content-center py-4">
						<a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
							<img src="{{ asset('img/logo.png') }}" alt="">
							<span class="d-none d-lg-block">NiceAdmin</span>
						</a>
					</div><!-- End Logo -->

					<div class="card mb-3">

						<div class="card-body">

							<div class="mb-4 mt-2 ">
								<p>
									Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
								</p>
							</div>

							@if (session('status') === 'verification-link-sent')
								<x-auth-session-status class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert" :status="'A new verification link has been sent to the email address you provided during registration.'" />
							@endif
							{{-- Session Status --}}

							<form method="POST" action="{{ route('verification.send') }}">
							@csrf
								<div class="d-grid mb-1">
									<button type="submit" class="btn btn-primary">Resend Verification Email</button>
								</div>
							</form>

							<form method="POST" action="{{ route('logout') }}">
								@csrf

								<div class="d-grid mb-3">
									<button type="submit" class="btn btn-secondary">Log Out</button>
								</div>
							</form>

						</div>
					</div>

				</div>
			</div>
		</div>

	</section>

</x-guest-layout>



