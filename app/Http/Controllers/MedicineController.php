<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return Medicine::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'scientific_name' => 'required|string',
            'commercial_name' => 'required|string',
            'category_id' => 'required|integer',
            'expiration_date' => 'required|date',
            'available_amount' => 'required|integer',
            'price' => 'required|integer',
            'company_id' => 'required|integer',
            'provider_id' => 'required|integer'
        ]);
        Medicine::create([
            'scientific_name' => $request->scientific_name,
            'commercial_name' => $request->commercial_name,
            'category_id' => $request->category_id,
            'expiration_date' => $request->expiration_date,
            'available_amount' => $request->available_amount,
            'price' => $request->price,
            'company_id' => $request->company_id,
            'provider_id' => $request->provider_id
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
