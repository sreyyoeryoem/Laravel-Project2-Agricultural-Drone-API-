<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\ShowPlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = Plan::all();
        $plan = PlanResource::collection($plan);
        return response()->json(['success' => true, 'data' => $plan], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        $plan = Plan::store($request);
        return response()->json(['success' => true, 'data' => $plan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function showsPecifiedInstruction(string $id)
    {
        $plan = Plan::where("name", $id)->first();
        $pecifiedInstruction = new ShowPlanResource($plan);
        return response()->json(['success' => true, 'data' => $pecifiedInstruction], 200);
    }
    
}
