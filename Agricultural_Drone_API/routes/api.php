<?php

use App\Http\Controllers\DronController;
use App\Http\Controllers\drone_plansController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
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

// ===============================plan=====================================
Route::get('/plans', [PlanController::class, 'index']);    
Route::post('/plans/plan', [PlanController::class, 'store']);
// Route::post('/plans/plan', [PlanController::class, 'store']);


// =============================Instruction================================
Route::get("/instructions",[InstructionController::class, 'index']);
Route::post("/instructions",[InstructionController::class, 'store']);

// ===============================Drone=====================================
Route::get('/drones', [DronController::class, 'index']);    
Route::post('/drones', [DronController::class, 'store']);
Route::get('/drones/{drone_id}/location', [DronController::class, 'getLocationDroen']);

// ===============================Drone_plan=====================================
Route::get('/drone_plans', [drone_plansController::class, 'index']);    
Route::post('/drone_plans', [drone_plansController::class, 'store']);

// ===============================Map=====================================
Route::get('/maps', [MapController::class, 'index']);    
Route::post('/maps', [MapController::class, 'store']);
Route::get('/maps/{province}/{id}', [MapController::class, 'DownloadMapPhoto']);
