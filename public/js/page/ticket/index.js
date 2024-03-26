$(function(){

	let this_id;

	let modal = $("#ticket-modal");

	let table = $("#ticket-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/tickets/table",
			dataType: "json",
			error: function (errors) {
				toast.fire({
					icon: 'error',
					title: 'Invalid Data Token.',
				})
			},
		},
		language: {
			searchPlaceholder: "Search Records..",
		},
		columns: [
			{ data: "title", name: "title" },
			{ data: "priority", name: "priority" },
			{ data: "status", name: "status" },
			{
				data: "action",
				name: "action",
				orderable: false,
				searchable: false,
			},
		],
	});

	$("#custom-search-field").keyup(function () {
		table.search($(this).val()).draw();
	});
	// custom page length
	$("#custom-page-length").change(function () {
		table.page.len($(this).val()).draw();
	}).trigger('change');

	$('body').on('click','.delete-ticket', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});

	$('body').on('click','#destroy-ticket', function () {

		$.ajax({
			url: "/tickets/" + this_id,
			method: "DELETE",
			dataType: "json",
			beforeSend: function () {
				buttons('destroy-ticket', 'start');
			}
		})
		.done(function (response) {
			table.ajax.reload();
			toast.fire({
				icon: 'success',
				title: response.message,
			});
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			toast.fire({
				icon: 'error',
				title: jqXHR.responseJSON.message,
			});
		})
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
			buttons('destroy-ticket', 'finish');
			modal.modal('hide');
		});
	})

})
