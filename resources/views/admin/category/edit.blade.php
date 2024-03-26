<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Categories</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
				<li class="breadcrumb-item active">Edit</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Update Category</h5>

						<!-- Multi Columns Form -->
						<form class="row g-3" method="POST" action="{{ route('categories.update', $category->id) }}" >
							@csrf
							@method('PUT')

							<div class="col-md-12">
								<label for="name" class="form-label">Name</label>
								<input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
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
