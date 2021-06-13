<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use App\Models\District;
use App\Models\Find;
use App\Models\Objects;
use App\Models\Post;
use App\Models\Region;
use App\Models\Topographie;
use App\Models\User;
use App\Models\Village;
use App\Traits\Helper;
use App\Traits\Model\Traits\PostgresArray;
use Illuminate\Http\Request;
use App\Services\ImageService;

class ObjectController extends Controller
{
    private $imageService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $objects = Objects::all();
        foreach ($objects as $item){
            $item['authors'] =  PostgresArray::accessPgArray($item['authors']);
        }
        //dd($objects);
        $finds = Find::get(['id','material_id','object_id']);
        $posts = Post::pluck( 'name', 'id')->toArray();
        $districts = District::pluck('name', 'code')->toArray();
        $villages = Village::pluck( 'name', 'id')->toArray();
        $topographies = Topographie::pluck('name',  'id')->toArray();
        $users = User::pluck('name')->toArray();
        $cultures = Culture::pluck('name', 'id')->toArray();
        return view('object.index')
            ->with(compact($objects, 'objects'))
            ->with(compact($finds, 'finds'))
            ->with(['districts' => $districts])
            ->with(['villages' => $villages])
            ->with(['cultures' => $cultures])
            ->with(['users' => $users])
            ->with(['posts' => $posts])
            ->with(['topographies' => $topographies]);

    }

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
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

        $users = User::pluck('name')->toArray();
        $topographies = Topographie::pluck('name', 'id')->toArray();
        $cultures = Culture::pluck('name')->toArray();


        // dd($finds);


        return view('object.create')
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['authors'] = Helper::phpArrayToPostgresArray($data['authors']);

        $data['photos'] = [];
        foreach ($request->photos as $photo) {
            $data['photos'][] = $this->imageService->save($photo, 'other', false);

        }
        $data['photos'] = Helper::phpArrayToPostgresArray($data['photos']);


        $item = new Objects($data);
        $item->save();
        return redirect()->route('object.index');

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
