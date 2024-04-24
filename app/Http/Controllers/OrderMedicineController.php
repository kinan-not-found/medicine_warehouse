<?php

namespace App\Http\Controllers;

use App\Models\OrderMedicine;
use Illuminate\Http\Request;

class OrderMedicineController extends Controller
{
    public function index()
    {
        return OrderMedicine::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'medicine_id' => 'required|integer'
        ]);
        OrderMedicine::create([
            'order_id' => $request->order_id,
            'medicine_id' => $request->medicine_id
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $order_medicine = OrderMedicine::findOrFail($id);
        $order_medicine->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
