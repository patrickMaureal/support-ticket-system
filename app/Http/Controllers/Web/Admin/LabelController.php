<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.label.index');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Label $label)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Label $label)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Label $label)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Label $label)
	{
		//
	}
}
