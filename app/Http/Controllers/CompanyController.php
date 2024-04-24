<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::get();
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        Company::create([
            'name' => $request->name
        ]);
        return response()->json([
            'data' => 'done'
        ]);
    }
    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json([
            'data' => 'done'
        ]);
    }
}
