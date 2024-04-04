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

		$user = auth()->user();
		// Check if the authenticated user is an admin
		if ($user->hasRole('Administrator')) {
		// If admin, count all tickets
		$ticketcount = Ticket::count();
		$openticket = Ticket::where('status', 'Open')->count();
		$closedticket = Ticket::where('status', 'Closed')->count();
		} else {
			// If not admin, count tickets created by the user or assigned to them
			$ticketcount = Ticket::where(function ($query) {
					$query->where('created_at', auth()->id()) // Tickets created by the authenticated user
							->orWhere('agent', auth()->id()); // Tickets assigned to the authenticated user
			})->count();
			$openticket = Ticket::where('status', 'Open')->where('agent', auth()->id())->count();
			$closedticket = Ticket::where('status', 'Closed')->where('agent', auth()->id())->count();
		}



		return view('dashboard', compact('ticketcount', 'openticket', 'closedticket'));
	}
}
