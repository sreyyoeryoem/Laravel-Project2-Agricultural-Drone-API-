<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        return response()->json(['success' => true, 'data' => $location], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeLocationRequest $request)
    {
        $location = Location::store($request);
        return response()->json(['success' => true, 'data' => $location], 201);
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
