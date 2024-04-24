<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return City::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country_id' => 'required|integer'
        ]);
        City::create([
            'name' => $request->name,
            'country_id' => $request->country_id
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
