<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruction = Instruction::all();
        return response()->json(['success' => true, 'data' => $instruction], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(1)
        // dd($request->input("Maximum_altitude"));
        $instruction = Instruction::create([
            'Flight_time' => $request->input("Flight_time"),
            'Maximum_altitude' => $request->input("Maximum_altitude"),
            'Maximum_speed' => $request->input("Maximum_speed"),
            'Camera' => $request->input("Camera"),
            'action' => $request->input("action"),
        ]);
        return response()->json(['success' => true, 'data' => $instruction], 201);
    }
    
}
