<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.category.index');
	}

	public function showTable(){
		if (request()->ajax()) {
			$categories = Category::select('id','name')->get();

			return DataTables::of($categories)
			->addColumn('action', 'admin.category.table-buttons')
			->rawColumns(['action'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCategoryRequest $request)
	{
		$data = $request->validated();

		$category = new Category();
		$category->name = $data['name'];
		$category->save();

		toast()->success('Category created successfully');
		return redirect()->route('categories.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Category $category)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Category $category)
	{
		return view('admin.category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateCategoryRequest $request, Category $category)
	{
		$data = $request->validated();

		$category->name = $data['name'];
		$category->save();

		toast()->success('Category updated successfully');
		return redirect()->route('categories.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Category $category)
	{
		//
	}
}
