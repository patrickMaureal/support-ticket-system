<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketRequest;
use App\Models\Ticket\Ticket;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;


class TicketController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.ticket.index');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.ticket.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreTicketRequest $request	)
	{
		$data = $request->validated();

		$tickets = new Ticket();
		$tickets->title = $data['title'];
		$tickets->description = $data['description'];
		$tickets->priority = $data['priority'];
		$tickets->save();

		toast('Ticket created successfully', 'success');

		return redirect()->route('tickets.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
