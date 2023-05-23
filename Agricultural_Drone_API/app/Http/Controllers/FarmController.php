<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farm = Farm::all();
        return response()->json(['success' => true, 'data' => $farm], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $farm = Farm::create([
            'province' => $request->input("province"),
        ]);
        return response()->json(['success' => true, 'data' => $farm], 201);
    }

}
