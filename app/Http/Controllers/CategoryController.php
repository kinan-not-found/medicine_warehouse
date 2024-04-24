<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|integer'
        ]);
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
