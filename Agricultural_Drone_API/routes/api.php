<?php

use App\Http\Controllers\drone_plansController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\UserController;
use App\Models\Location;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group( function() {
    
});
// ============================Role====================================

Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles', [RoleController::class, 'store']);
// Route::get('/roles', [RoleController::class, 'show']);
// Route::put('/roles', [RoleController::class, 'update']);
// Route::delete('/roles', [RoleController::class, 'destroy']);

// ============================User====================================

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'register']);

// =============================Location================================

Route::get("/locations",[LocationController::class, 'index']);
Route::post("/locations",[LocationController::class, 'store']);

// =============================Farm================================
Route::get("/farms",[FarmController::class, 'index']);
Route::post("/farms",[FarmController::class, 'store']);

// =============================Instruction================================
Route::get("/instructions",[InstructionController::class, 'index']);
Route::post("/instructions",[InstructionController::class, 'store']);

// =============================Done-plans================================
Route::get("/done-plan",[drone_plansController::class, 'index']);
Route::post("/done-plan",[drone_plansController::class, 'store']);