<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	function view(){
		$datacategory = Category::all();
		return view('category/view', compact('datacategory'));
	}

	function create(){
		return view('category.create');
	}

	function store(Request $request){
		Category::create([
			'name' => $request->name,
			'Description' => $request->description,
			]);

		return redirect('category');
	}

	function edit($id){
		$data = Category::find($id);
		return view('category.edit', compact('data'));
	}

	function update(Request $request, $id){
		Category::find($id)->update([
			'name' => $request->name,
			'Description' => $request->description,
			]);

		return redirect('category');
	}

	function delete($id){
		Category::destroy($id);
		return redirect('category');
	}
}
