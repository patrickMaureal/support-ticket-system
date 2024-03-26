<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Categories</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Ticket</a></li>
				<li class="breadcrumb-item active">Create</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Add Category</h5>

						<!-- Multi Columns Form -->
						<form class="row g-3" method="POST" action="{{ route('categories.store') }}">
							@csrf

							<div class="col-md-12">
								<label for="title" class="form-label">Title<x-asterisk/></label>
								<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
								@error('title')
                	<x-input-error message="{{ $message }}" />
                @enderror
							</div>

							<div class="text-start">
								<a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
