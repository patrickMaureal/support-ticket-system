<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketRequest;
use App\Http\Requests\Admin\Ticket\UpdateTicketRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Ticket\Ticket;
use App\Models\User\User;
use App\Models\Category\Category;
use App\Models\Label\Label;

class TicketController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		return view('admin.ticket.index');
	}

	public function showTable(){
		if (request()->ajax()) {
			$user = auth()->user();

			$tickets = Ticket::leftJoin('users as agent', 'agent.id', '=', 'tickets.agent')
			->join('users as user', 'user.id', '=', 'tickets.created_by')
			->select('tickets.id', 'tickets.title', 'user.name as created_by', 'agent.name as agent_name', 'tickets.priority', 'tickets.status')
			->orderByDesc('tickets.created_at');

			if ($user->hasRole('Agent')) {
				$tickets->where('tickets.created_by', $user->id);
			} elseif ($user->hasRole('User')) {
				$tickets->where('tickets.created_by', $user->id);
			}

			return DataTables::of($tickets)
			->editColumn('status', function ($tickets) {
				$bgColor = ($tickets->status == 'Open') ? 'bg-success' : 'bg-info';
				return '<span class="badge rounded-pill '.$bgColor.'">'.$tickets->status.'</span>';
			})
			->editColumn('agent_name', function ($ticket) {
				return $ticket->agent_name ?? 'No Agent Assigned';
			})
			->addColumn('action', 'admin.ticket.table-buttons')
			->rawColumns(['action','status'])
			->toJson();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Category $category): View
	{
		$categories = Category::all();
		$labels = Label::all();
		$agents = User::role('Agent')->get();
		return view('admin.ticket.create',compact('categories','labels','agents'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreTicketRequest $request	): RedirectResponse
	{
		$data = $request->validated();

		$tickets = new Ticket();
		$tickets->agent = $data['agent'];
		$tickets->title = $data['title'];
		$tickets->description = $data['description'];
		$tickets->category = $data['category'];
		$tickets->label = $data['label'];
		$tickets->priority = $data['priority'];
		$tickets->created_by = auth()->user()->id;
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
	public function edit(Ticket $ticket): View
	{
		$categories = Category::all();
		$labels = Label::all();
		//get the all users that have "Agent" role i am using spatie role
		$agents = User::role('Agent')->get();
		return view('admin.ticket.edit',compact('ticket','categories','labels','agents'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateTicketRequest $request, Ticket $ticket):RedirectResponse
	{
		$data = $request->validated();

		//assign ticket to agent

		$ticket->agent = $data['agent'];
		$ticket->title = $data['title'];
		$ticket->description = $data['description'];
		$ticket->category = $data['category'];
		$ticket->label = $data['label'];
		$ticket->priority = $data['priority'];
		$ticket->status = $data['status'];
		$ticket->comments = $data['comments'];
		$ticket->save();

		toast('Ticket updated successfully', 'success');
		return redirect()->route('tickets.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, Ticket $ticket)
	{
		if($request->ajax()) {

			$ticket->delete();

			return response()->json([
				'status' => 'success',
				'message' => 'Ticket has been successfully deleted.',
			],Response::HTTP_OK);
		}
	}

	public function userStoreTicket(Request $request)
	{
		$data = $request->validate([
			'title' => 'required',
			'description' => 'required',
			'category' => 'required',
			'label' => 'required',
			'priority' => 'required',
		]);

		$tickets = new Ticket();
		$tickets->title = $data['title'];
		$tickets->description = $data['description'];
		$tickets->category = $data['category'];
		$tickets->label = $data['label'];
		$tickets->priority = $data['priority'];
		$tickets->created_by = auth()->user()->id;
		$tickets->agent = null;
		$tickets->save();

		toast('Ticket created successfully', 'success');

		return redirect()->route('tickets.index');
	}
}
