<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

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
			$users = User::select('id', 'name', 'email')->get();

			return DataTables::of($users)
			->addColumn('action','admin.user.table-buttons')
			->rawColumns(['action'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.user.create');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, User $user)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user)
	{
		//
	}
}
