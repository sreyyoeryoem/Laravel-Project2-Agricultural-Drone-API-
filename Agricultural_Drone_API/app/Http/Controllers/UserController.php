<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $users = UserResource::collection($users);
        return response()->json(["Get all uses",true,"users"=>$users],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(StoreUserRequest $request)
    {
        $user = User::store($request);
        $user= UserResource::collection($user);
        $token = null;
        if ($user->role_id == '1') {
            $token = $user->createToken('ADMIN-TOKEN', ['select', 'create', 'update', 'delete']);
        } else {
            $token = $user->createToken("USER-TOKEN", ['select']);
        }
        return response()->json(['success' =>true, 'data' => $user,'token' => $token],201);
    }


    public function login(StoreUserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user->createToken('API Token')->plainTextToken);
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
