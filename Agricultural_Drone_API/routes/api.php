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
   


});

Route::middleware('auth:sanctum')->group( function() {
    Route::post('/users/logout', [UserController::class, 'logout']);
    // =============================Location================================

    Route::get("/locations",[LocationController::class, 'index']);
    Route::post("/locations",[LocationController::class, 'store']);

    // =============================Farm================================
    Route::get("/farms",[FarmController::class, 'index']);
    Route::post("/farms",[FarmController::class, 'store']);

    // ===============================plan=====================================
    Route::get('/plans', [PlanController::class, 'index']);    
    Route::post('/plans', [PlanController::class, 'store']);
    Route::get('/plans/{name}', [PlanController::class, 'showsPecifiedInstruction']);
    Route::post('/plans/plan', [PlanController::class, 'store']);


    // =============================Instruction================================
    Route::get("/instructions",[InstructionController::class, 'index']);
    Route::post("/instructions",[InstructionController::class, 'store']);

    // ===============================Drone=====================================
    Route::get('/drones', [DronController::class, 'index']);    
    Route::post('/drones', [DronController::class, 'store']);
    Route::get('/drones/{drone_id}', [DronController::class, 'show']);
    Route::put('/drones/{drone_id}', [DronController::class, 'update']);
    Route::get('/drones/{drone_id}/location', [DronController::class, 'getLocationDrone']);
    Route::put('/udpdat_drones_instructions/{drone_id}', [DronController::class, 'updateStatusDrone']);



    // ===============================Drone_plan=====================================
    Route::get('/drone_plans', [drone_plansController::class, 'index']);    
    Route::post('/drone_plans', [drone_plansController::class, 'store']);

    // ===============================Map=====================================
    Route::get('/maps', [MapController::class, 'index']);    
    Route::post('/maps', [MapController::class, 'store']);
    Route::get('/maps/{province}/{id}', [MapController::class, 'DownloadMapPhoto']);
    Route::delete('/maps/{province}/{id}', [MapController::class, 'deleteMap']);
    Route::post('/maps/{province}/{id}', [MapController::class, 'createMap']);

    
});

// ============================User====================================

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/register', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);


