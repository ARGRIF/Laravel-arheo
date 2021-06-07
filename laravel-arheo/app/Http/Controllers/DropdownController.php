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



    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
        return response()->json($cities);
    }
}
