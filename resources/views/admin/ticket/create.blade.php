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
						<form class="row g-3">
							<div class="col-md-12">
								<label for="title" class="form-label">Title</label>
								<input type="text" class="form-control" id="title" name="title">
							</div>
							<div class="col-md-12">
								<label for="message" class="form-label">Message</label>
								<textarea class="form-control" placeholder="Message" id="floatingTextarea" style="height: 100px;" name="message" id="message"></textarea>
							</div>
							<div class="col-md-12">
								<label for="label" class="form-label">Label</label>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="bug">
									<label class="form-check-label" for="bug">
										Bug
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="enhancement">
									<label class="form-check-label" for="enhancement">
										Enhancement
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="question">
									<label class="form-check-label" for="question">
										Question
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<label for="category" class="form-label">Category</label>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="uncategorized" value="uncategorized">
									<label class="form-check-label" for="uncategorized">
										Uncategorized
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="billing" value="billing">
									<label class="form-check-label" for="billing">
										Billing/Payments
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="technical" value="technical">
									<label class="form-check-label" for="technical">
										Technical Question
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-select" id="floatingSelect" aria-label="State">
										<option selected value="low">Low</option>
										<option value="mid">Mid</option>
										<option value="high">High</option>
									</select>
									<label for="floatingSelect">Priority</label>
								</div>
							</div>
							<div class="text-start">
								<button type="reset" class="btn btn-secondary">Back</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
