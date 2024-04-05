<x-app-layout>

	<div class="pagetitle mb-4">
		<h1>Ticket Logs</h1>
	</div><!-- End Page Title -->

	<div class="table-settings mb-4">
		<div class="row align-items-center justify-content-between">
			<div class="col-9 col-lg-8 d-md-flex">
				<form action="{{ route('ticket-logs.index') }}" method="GET">
					<div class="input-group me-2 me-lg-3 fmxw-400">
						<input type="text" name="search" value="{{ $searchVal }}" class="form-control" placeholder="Search description">
						<span class="input-group-text">
							<button type="submit" class="btn btn-xs">
								<i class="icon fs-6 bi bi-search"></i>
							</button>
						</span>
					</div>
				</form>
			</div>
			<div class="col-3 col-lg-4 d-flex justify-content-end">
				{{-- <x-table-page-length id="activity-log-page-length"></x-table-page-length> --}}
			</div>
		</div>
	</div>
	<div class="card mb-5">
		<div class="card-body">

			<x-table id="activity-log-table">
				<thead class="thead-light">
					<tr>
						<th class="rounded-start">Log Name</th>
						<th>User</th>
						<th>Description</th>
						<th>Event</th>
						<th>Dated Added</th>
						<th class="rounded-end" width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($activityLogs as $activityLog)
						<tr>
							<td valign="middle">
								<span class="fw-normal">{{ $activityLog->log_name }}</span>
							</td>
							<td valign="middle">
								<span class="fw-normal">{{ $activityLog->causer_name }}</span>
							</td>
							<td valign="middle">
								<span class="fw-normal">{{ $activityLog->description }}</span>
							</td>
							<td valign="middle">
								@php
									switch ($activityLog->event) {
										case 'created':
											$badgeColor = 'bg-success';
											break;
										case 'updated':
											$badgeColor = 'bg-info';
											break;
										case 'deleted':
											$badgeColor = 'bg-warning';
											break;
										case 'created':
										default:
											$badgeColor = 'bg-primary';
											break;
									}
								@endphp
								<span class="text-uppercase badge rounded-pill {{ $badgeColor }} text-white">{{ $activityLog->event }}</span>
							</td>
							<td valign="middle">
								<span class="fw-normal">{{ $activityLog->created_at->format('F d, Y H:i:s') }}</span>
							</td>
							<td valign="middle">
								{{-- <x-three-dots-dropdown>
									<a class="dropdown-item rounded-top rounded-bottom" href="{{ route('activity-logs.show', $activityLog->id) }}"><span class="bi bi-eye-fill text-success me-2"></span>View</a>
								</x-three-dots-dropdown> --}}
								<a class="btn btn-success btn-sm" href="{{ route('ticket-logs.show', $activityLog->id) }}"><i class="bi bi-eye-fill"></i>View</a>

							</td>
						</tr>
					@empty
						<tr class="text-center">
							<td colspan="4">No data.</td>
						</tr>
					@endforelse
				</tbody>
			</x-table>
		</div>
		<div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">

			{{-- pagination --}}
			{{-- {{ $activityLogs->links('vendor.pagination.bootstrap-5') }} --}}

		</div>
	</div>

</x-app-layout>
