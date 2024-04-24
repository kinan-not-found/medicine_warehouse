<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'price' => 'required|integer',
            'time_limit' => 'required|date',
            'pharmacist_id' => 'required|integer',
            'status' => 'required|in:pending,processing'
        ]);
        Order::create([
            'date' => $request->date,
            'price' => $request->price,
            'time_limit' => $request->time_limit,
            'pharmacist_id' => $request->pharmacist_id,
            'status' => $request->status
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
