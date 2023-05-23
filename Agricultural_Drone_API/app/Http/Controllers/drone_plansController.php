<?php

namespace App\Http\Controllers;

use App\Models\Drone_plan;
use Illuminate\Http\Request;

class drone_plansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone_plan = Drone_plan::all();
        return response()->json(['success' => true, 'data' => $drone_plan], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drone_plan = Drone_plan::create([
            'drone_id' => $request->input("drone_id"),
            'plan_id' => $request->input("plan_id"),
        ]);
        return response()->json(['success' => true, 'data' => $drone_plan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drone_plan = Drone_plan::all();

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
