<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }
    public function show($id)
    {
        $user = User::with(['city', 'languages'])->find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }
    public function getUserMedicines($id)
    {
        $user = User::find($id);
        if($user->role == "provider")
        {
        }
        else
        {
            return response()->json(['message' => 'Pharmacist can\'t provide medicines']);
        }
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
