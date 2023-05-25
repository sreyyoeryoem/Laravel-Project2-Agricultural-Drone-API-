<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\showLocationDrone;
use App\Models\Drone;
use Illuminate\Http\Request;

class DronController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        $drone = DroneResource::collection($drone);
        return response()->json(['success' => true, 'data' => $drone], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDroneRequest $request)
    {
        $drone = Drone::store($request);
        return response()->json(['success' => true, 'data' => $drone], 201);
    }


    public function show(string $id)
    {
        $drone = Drone::where("drone_id", $id)->first();
        return response()->json(['success' => true, 'data' => $drone], 201);
    }


    public function update(StoreDroneRequest $request, string $drone_id)
    {
        $drone = Drone::where("drone_id", $drone_id)->first();
        $drone = $drone::store($request,$drone_id);
        return response()->json(['success' => true, 'data' => $drone], 201);
    }
    
    public function getLocationDroen(string $id){
        $data = Drone::where("drone_id", $id)->first();
        $data = new showLocationDrone($data);
        return response()->json(['success' => true, 'data' => $data], 200);
        
    }


 
}

