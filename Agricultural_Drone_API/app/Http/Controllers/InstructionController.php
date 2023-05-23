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
        $instruction = Instruction::create([
            'action' => $request->input("action"),
            'user_id' => $request->input("user_id"),
            'drone_id' => $request->input("drone_id"),
        ]);
        return response()->json(['success' => true, 'data' => $instruction], 201);
    }
    
}
