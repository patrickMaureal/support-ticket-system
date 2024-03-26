<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Tickets</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Ticket</a></li>
				<li class="breadcrumb-item active">Edit</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Update Ticket</h5>

						<!-- Multi Columns Form -->
						<form class="row g-3" method="POST" action="{{ route('tickets.update') }}" >
							@csrf
							@method('PUT')

							<div class="col-md-12">
								<label for="title" class="form-label">Title</label>
								<input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}">
							</div>
							<div class="col-md-12">
								<label for="description" class="form-label">Description</label>
								<textarea class="form-control" placeholder="Description" id="description" style="height: 100px;" name="description" id="description" value="{{ $ticket->description }}"></textarea>
							</div>

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-select" id="priority" aria-label="priority" name="priority">
										<option value="Low">Low</option>
										<option value="Mid">Mid</option>
										<option value="High">High</option>
									</select>
									<label for="floatingSelect">Priority</label>
								</div>
							</div>
							<div class="text-start">
								<a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
