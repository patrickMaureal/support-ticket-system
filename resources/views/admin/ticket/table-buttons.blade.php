<div>
	<a class="btn btn-success btn-sm" href="{{ route('tickets.edit', $id) }}"><i class="bi bi-pen"></i></a>
	@role('Administrator|Agent')
		<button class="delete-ticket btn btn-danger btn-sm" data-id="{{ $id }}"><i class="bi bi-trash"></i></button>
	@endrole
</div>
