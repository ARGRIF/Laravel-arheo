<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use App\Models\District;
use App\Models\Post;
use App\Models\Region;
use App\Models\Topographie;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $regions = Region::pluck('name')->toArray();
        $districts = District::all();
        //$villages = Village::all();   //->where('district_id', '2');
        $users = User::pluck('name')->toArray();
        $topographies = Topographie::pluck('name')->toArray();
        $cultures = Culture::pluck('name')->toArray();
       //dd($villages[127]);
        return view('post.create')
            ->with(compact($districts, 'districts'))
            //->with(compact($villages, 'villages'))
            ->with(['topographies' => $topographies])
            ->with(['cultures' => $cultures])
            ->with(['users' => $users])
            ->with(['regions' => $regions])
            ;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
