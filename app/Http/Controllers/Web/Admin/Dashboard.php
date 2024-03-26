<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Ticket $ticket, Request $request)
	{
		return view('dashboard',compact('ticket'));
	}
}
