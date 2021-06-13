<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Culture;
use App\Models\District;
use App\Models\Find;
use App\Models\Material;
use App\Models\Objects;
use App\Models\Post;
use App\Models\Region;
use App\Models\Topographie;
use App\Models\User;
use App\Models\Village;
use App\Traits\Helper;
use App\Traits\Model\Traits\PostgresArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $finds = Find::all();
        foreach ($finds as $item){
            $item['authors'] =  PostgresArray::accessPgArray($item['authors']);
            if($item['involved_person'] == null){
                $item['involved_person'] = '-';
            }
        }
        //dd($objects);
        $objects = Objects::pluck( 'name', 'id')->toArray();
        $materials = Material::pluck( 'name', 'id')->toArray();
        $categories = Category::pluck( 'name', 'id')->toArray();
        $posts = Post::pluck( 'name', 'id')->toArray();
        $districts = District::pluck('name', 'code')->toArray();
        $villages = Village::pluck( 'name', 'id')->toArray();
        $topographies = Topographie::pluck('name',  'id')->toArray();
        $users = User::pluck('name')->toArray();
        $cultures = Culture::pluck('name', 'id')->toArray();
        return view('find.index')
            ->with(compact($finds, 'finds'))
            ->with(['objects' => $objects])
            ->with(['districts' => $districts])
            ->with(['villages' => $villages])
            ->with(['cultures' => $cultures])
            ->with(['users' => $users])
            ->with(['materials' => $materials])
            ->with(['categories' => $categories])
            ->with(['posts' => $posts])
            ->with(['topographies' => $topographies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $regions = Region::pluck('name')->toArray();
        $districts = District::all();
        $materials = Material::pluck('name', 'id')->toArray();
        $posts = Post::pluck('finds_quantity', 'id')->toArray();
        $users = User::pluck('name')->toArray();
        $topographies = Topographie::pluck('name', 'id')->toArray();
        $cultures = Culture::pluck('name')->toArray();

        return view('find.create')
            ->with(compact($districts, 'districts'))
            //->with(compact($materials, 'materials'))
            ->with(['topographies' => $topographies])
            ->with(['cultures' => $cultures])
            ->with(['materials' => $materials])
            ->with(['users' => $users])
            ->with(['posts' => $posts])
            ->with(['regions' => $regions])
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
       // dd($data);
        $data['post_id'] = explode('_', $data['post_id'])[0];
        $data['authors'] = Helper::phpArrayToPostgresArray($data['authors']);
       // dd($data);
        $item = new Find($data);
        $item->save();
        if($data['object_id']){
            DB::table('objects')
                ->where('id', $data['object_id'])
                ->increment('finds_quantity', 1)
               ;
        }

        DB::table('posts')
            ->where('id', $data['post_id'])
            ->update(['finds_quantity' => $data['find_number'] + 1]);
        return redirect()->route('find.index');

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
