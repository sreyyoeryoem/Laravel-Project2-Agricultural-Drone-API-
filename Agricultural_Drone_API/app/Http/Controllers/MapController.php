<?php

namespace App\Http\Controllers;

use App\Http\Resources\DownloadmapphotoResource;
use App\Http\Resources\MapResource;
use App\Models\Farm;
use App\Models\Map;
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


    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $map = Map::store($request);
        return response()->json(['success' => true, 'data' => $map], 201);
    }

    /**
     * Display the specified resource.
     */
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

    






    {
    //     $map = Farm::where('id', $id)
    //     ->whereHas('maps',$map = Farm::where('id', $id)
    //     ->whereHas('maps', function ($query) use ($province) {
    //         $query->where('province', $province);
    //     })
    //     ->with('maps')->first());
    //    dd($map);
    // return (1);
        $province = Map::where('province', $province)->first();
        // dd($province);
        // if(!isset($province)){
        //     return "doesn't exist";
        // }
        $farms = $province->farm->where("id",$id)->first();
        
        dd($farms);
        // if(empty($farms)){
        //     return "doesn't exist";
        // }

        // dd(DownloadmapphotoResource::collection(($farms)));
        return DownloadmapphotoResource::collection(($province));
        // $map = Map::where("province",$province)
        //     ->whereHas('farms', function ($query) use ($id) {
        //         $query->where('id', $id);
        //     })->with('farms')->first();
        //     dd($map);
            // return $map;


        // if($map ==null){
        //     return response()->json(['Not fount' => false],);
        // }
        // return response()->json(['success' => true, 'data' => $map->image], 201);

       
        
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
}