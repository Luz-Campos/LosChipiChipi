<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index')->with(['category' => $category]);
    }
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return response()->json(['success' => true]);
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['success' => true]);
    }
}
