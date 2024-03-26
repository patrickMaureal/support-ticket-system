<div>
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				@if ($type == 'delete')
					<div class="modal-header">
						<h5 class="modal-title">Delete Confirmation</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this {{ $label }}?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
						<button type="button" class="btn btn-primary" id="{{ $buttonId }}">Yes</button>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
