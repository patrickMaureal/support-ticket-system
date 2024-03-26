<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Label\StoreLabelRequest;
use App\Http\Requests\Admin\Label\UpdateLabelRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Label\Label;
use Illuminate\Http\Response;

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
		return view('admin.label.create');
	}

	public function showTable() {

		if (request()->ajax()) {
			$labels = Label::select('id', 'name')->get();

			return DataTables::of($labels)
			->addColumn('action', 'admin.label.table-buttons')
			->rawColumns(['action'])
			->toJson();
		}
	}
	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreLabelRequest $request)
	{
		$data = $request->validated();

		$label = new Label();
		$label->name = $data['name'];
		$label->save();

		toast()->success('Label created successfully');
		return redirect()->route('labels.index');
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
		return view('admin.label.edit', compact('label'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateLabelRequest $request, Label $label)
	{
		$data = $request->validated();

		$label->name = $data['name'];
		$label->save();

		toast()->success('Label updated successfully');
		return redirect()->route('labels.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, Label $label)
	{
		if($request->ajax()) {
			$label->delete();
			return response()->json([
				'success' => true,
				'message' => 'Label deleted successfully',
			],Response::HTTP_OK);
		}
	}
}
