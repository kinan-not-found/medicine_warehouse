<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Pharmacist;
use App\Models\User;
use Carbon\Carbon;

class PharmacistController extends Controller
{
    public function index()
    {
        return Pharmacist::get();
    }
    public function show($id)
    {
    }
    public function create(CreateUserRequest $request)
    {
        $userData = $request->validated();
        $userData['last_visit'] = Carbon::now();
        $userData['logged_in'] = 1;
        $userData['role'] = 'pharmacist';
        $user = User::create($userData);
        Pharmacist::create([
            'user_id' => $user->id
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
}
