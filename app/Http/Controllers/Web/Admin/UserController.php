<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

use App\Models\Role\Role;
use App\Models\User\User;


class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.user.index');
	}

	public function showTable() {
		if(request()->ajax()) {

			//query include the roles
			$users = User::where('id','!=',Auth::id())->with('roles')->select('id','name','email')->get();

			return DataTables::of($users)
			->addColumn('role', function ($user) {
				return $user->roles->pluck('name')->implode(', ');
			})
			//edit Column of role to have bg color
			->editColumn('role', function ($user) {
				$bgColor = ($user->roles->pluck('name')->implode(', ') == 'Administrator') ? 'bg-success' : (($user->roles->pluck('name')->implode(', ') == 'Agent')?'bg-primary':'bg-secondary');
				return '<span class="badge rounded-pill '.$bgColor.'">'.$user->roles->pluck('name')->implode(', ').'</span>';
			})
			->addColumn('action','admin.user.table-buttons')
			->rawColumns(['action','role'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$roles = Role::where('guard_name', 'web')->whereNotIn('name', ['User'])->pluck('name')->toArray();

		return view('admin.user.create',compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreUserRequest $request, User $user)
	{
		$data = $request->validated();

		$user = new User();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = Hash::make('12345678');
		$user->save();

		$user->assignRole($data['role']);

		toast('User created successfully', 'success');
		return redirect()->route('users.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(User $user)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user)
	{
		return view('admin.user.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateUserRequest $request, User $user)
	{
		$data = $request->validated();

		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->save();

		toast('User updated successfully', 'success');
		return redirect()->route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user,Request $request)
	{
		if($request->ajax()) {
			$user->delete();
			return response()->json([
				'success' => true,
				'message' => 'User deleted successfully',
			],Response::HTTP_OK);
		}
	}
}
