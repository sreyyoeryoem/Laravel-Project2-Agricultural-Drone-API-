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

}
