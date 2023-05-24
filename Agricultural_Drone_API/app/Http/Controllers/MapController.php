<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map  = Map::all();
        return response()->json(['success' => true, 'data' => $map], 200);


    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $map = Map::store($request);
        return response()->json(['success' => true, 'data' => $map], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
