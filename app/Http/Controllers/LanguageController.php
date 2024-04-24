<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return Language::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'user_id' => 'required|integer'
        ]);
        Language::create([
            'name' => $request->name,
            'user_id' => $request->user_id
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
