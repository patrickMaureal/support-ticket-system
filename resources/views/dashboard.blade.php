<x-app-layout>

	<div class="pagetitle mb-4">
		<h1>Dashboard</h1>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg-12">
				<div class="row">

					<!-- Sales Card -->
					<div class="col-md-4">
						<div class="card info-card sales-card">
							<div class="card-body">
								<h5 class="card-title">Tickets</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-ticket"></i>
									</div>
									<div class="ps-3">
										<h6 class="fw-bold">{{ $ticketcount }}</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Ticket Card -->
					<div class="col-md-4">
						<div class="card info-card revenue-card">
							<div class="card-body">
								<h5 class="card-title">Open Tickets</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-ticket"></i>
									</div>
									<div class="ps-3">
										<h6 class="fw-bold">{{ $openticket }}</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Open Ticket Card -->
					<div class="col-md-4">
						<div class="card info-card customers-card">
							<div class="card-body">
								<h5 class="card-title">Closed Tickets</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-ticket"></i>
									</div>
									<div class="ps-3">
										<h6 class="fw-bold">{{ $closedticket }}</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Closed Ticket Card -->

				</div>
			</div><!-- End Left side columns -->

		</div>
	</section>
</x-app-layout>
