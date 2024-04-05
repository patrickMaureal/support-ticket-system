<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class TicketLogController extends Controller
{
  public function index(Request $request): View
	{

		$searchVal = $request->search ?? null;

		$activityLogs = Activity::select('activity_log.id', 'log_name', 'description', 'event', 'activity_log.created_at', 'users.name as causer_name')
			->join('users', 'users.id', '=', 'activity_log.causer_id')
			->whereAny(['log_name', 'description', 'event'], 'LIKE', "%{$searchVal}%")
			->orderBy('activity_log.created_at', 'desc')
			->paginate(5)->withQueryString();
		return view('admin.ticket.logs.index',compact('activityLogs','searchVal'));
	}

	public function show(Activity $activity): View
	{
		$activity->load('causer', 'subject');

		return view('admin.ticket.logs.show', compact('activity'));
	}
}
