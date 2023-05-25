<?php

namespace App\Http\Controllers;

use App\Http\Resources\FarmResource;
use App\Http\Resources\showFarmResource;
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
        $farm = FarmResource::collection($farm);
        return response()->json(['success' => true, 'data' => $farm], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $farm = Farm::create([
            'name' => $request->input("name"),
            "map_id" => $request->input("map_id"),
        ]);
        return response()->json(['success' => true, 'data' => $farm], 201);
    }

}
