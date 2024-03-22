<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Tickets</h1>
	</div><!-- End Page Title -->

	<a href="{{ route('tickets.create') }}" class="btn btn-primary"><i class="bi bi-ticket me-1"></i>Add Ticket</a>

	<div class="row mt-4">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-body table-wrapper table-responsive">
					<h5 class="card-title">Datatables</h5>

					<!-- Table with stripped rows -->
					<table class="table table-hover" id="ticket-table">
						<thead>
							<tr>
								<th>Title</th>
								<th>Priority</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
					<!-- End Table with stripped rows -->
				</div>
			</div>

		</div>
	</div>

	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/page/ticket/index.js') }}"></script>
	@endpush

</x-app-layout>
