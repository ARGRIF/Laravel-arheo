<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function index()
    {

    }

    public function getVillagesList(Request $request)
    {
        $villages = DB::table("villages")
            ->where("district_id",$request->district_id)
            //->select("name","id")
            ->get(['id','name','code']);

        return response()->json($villages);
    }



    public function getPostsList(Request $request)
    {
        $posts = DB::table("posts")
            ->where("village_id",$request->village_id)
            //->select("name","id")
            ->get(['id','name','code','finds_quantity']);
        return response()->json($posts);
    }

    public function getObjectsList(Request $request)
    {
        $posts = DB::table("objects")
            ->where("post_id",$request->post_id)
            ->get(['id','name','code']);
        return response()->json($posts);
    }


    public function getCategoriesList(Request $request)
    {
        $posts = DB::table("categories")
            ->where("material_id",$request->material_id)
            ->get(['id','name']);
        return response()->json($posts);
    }

}
