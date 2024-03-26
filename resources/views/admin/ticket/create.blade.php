<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Tickets</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Ticket</a></li>
				<li class="breadcrumb-item active">Create</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Add Ticket</h5>

						<!-- Multi Columns Form -->
						<form class="row g-3" method="POST" action="{{ route('tickets.store') }}">
							@csrf

							<div class="col-md-12">
								<label for="title" class="form-label">Title<x-asterisk/></label>
								<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
								@error('title')
                	<x-input-error message="{{ $message }}" />
                @enderror
							</div>
							<div class="col-md-12">
								<label for="description" class="form-label">Description<x-asterisk/></label>
								<textarea class="form-control @error('title') is-invalid @enderror" placeholder="Description" id="description" style="height: 100px;" name="description" id="description" required></textarea>
								@error('description')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
							<fieldset class="row mb-3 mt-3">
								<legend class="col-form-label col-sm-2 pt-0">Category</legend>
								<div class="col-sm-10">
									@foreach ( $categories as $category )
										<div class="form-check">
											<input class="form-check-input" type="radio" name="category" id="{{ $category->name }}" value="{{ $category->id }}">
											<label class="form-check-label" for="{{ $category->name }}">
												{{ $category->name }}
											</label>
										</div>
									@endforeach
								</div>
							</fieldset>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-select" id="priority" aria-label="priority" name="priority" required>
										<option selected value="Low">Low</option>
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
