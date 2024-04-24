<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Provider;
use App\Models\User;
use Carbon\Carbon;

class ProviderController extends Controller
{
    public function index()
    {
        return Provider::get();
    }
    public function show($id)
    {
        $provider = Provider::with(['medicines', 'user'])->find($id);
        if (!$provider) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($provider);
    }
    public function create(CreateUserRequest $request)
    {
        $userData = $request->validated();
        $userData['last_visit'] = Carbon::now();
        $userData['logged_in'] = 1;
        $userData['role'] = 'provider';
        $user = User::create($userData);
        Provider::create([
            'user_id' => $user->id
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
}
