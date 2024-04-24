<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return Country::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'area_code' => 'required|regex:/[0-9]{5}/'
        ]);
        Country::create([
            'name' => $request->name,
            'area_code' => $request->area_code
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
