<?php

namespace App\Http\Controllers;

use App\Http\Resources\DownloadmapphotoResource;
use App\Http\Resources\MapResource;
use App\Models\Farm;
use App\Models\Map;
use Dotenv\Loader\Resolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map  = Map::all();
        $map = MapResource::collection($map);
        return response()->json(['success' => true, 'data' => $map], 200);  
        return response()->json(['success' => true, 'data' => $map], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $map = Map::store($request);
        return response()->json(['success' => true, 'data' => $map], 201);
    }

    // =========================================Download image map of farm=======================

    public function DownloadMapPhoto($province,$id)
    {
        $farmId = Farm::where('id', $id)->first();
        $map = Map::where('province', $province)->first();
        if($map){
            if($farmId){
                return response()->json(["image"=>$map->image], 200);
            }
            else{
                return response()->json(["message"=> "image not found!"], 404);
            }
        }
    }
    // =========================================Delete image map of farm=======================
    public function deleteMap($province,$id)
    {
        $farmId = Farm::where('id', $id)->first();
        $map = Map::where('province', $province)->first();
        if($map){
            if($farmId){
                $map->image = "null";
                $map->save();
            }
            else{
                return response()->json(["message"=> "image not found!"], 404);
            }
        }
        return response()->json(['success' => true, 'data' => $map], 201);
    }


    // =========================================Create image map of farm=======================

    public function createMap(Request $request, $province, $id)
    {
        $farmId = Farm::where('id', $id)->first();
        $map = Map::where('province', $province)->first();

        if($map){
            if($farmId){
                $map->image = $request->input("image");
                $map->save();
            }
            else{
                return response()->json(["message"=> "image not found!"], 404);
            }
        }
        return response()->json(['success' => true, 'data' => $map], 201);
    }

}