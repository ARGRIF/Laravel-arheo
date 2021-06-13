<?php

namespace App\Http\Controllers;



use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Culture;
use App\Models\District;
use App\Models\Find;
use App\Models\Objects;
use App\Models\Post;
use App\Models\Region;
use App\Models\Topographie;
use App\Models\User;
use App\Services\ImageService;

use App\Models\Village;
use App\Traits\Helper;

use App\Traits\Model\Traits\PostgresArray;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * @var ImageService
     */
    private $imageService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::all();
        foreach ($posts as $item){
            $item['topographies'] =  PostgresArray::accessPgArray($item['topographies']);
            $item['authors'] =  PostgresArray::accessPgArray($item['authors']);
            $item['cultures'] =  PostgresArray::accessPgArray($item['cultures']);
        }
        //dd($posts);
        $objects = Objects::all();
       // dd($object_count);

        $finds = Find::get(['id','material_id','post_id']);
       // dd($finds);

        $districts = District::pluck('name', 'code')->toArray();
        $villages = Village::pluck( 'name', 'id')->toArray();
        $topographies = Topographie::pluck('name',  'id')->toArray();
        $users = User::pluck('name')->toArray();
        $cultures = Culture::pluck('name')->toArray();
        //dd($posts);
        return view('post.index')
            ->with(compact($objects, 'objects'))
            ->with(compact($posts, 'posts'))
            ->with(compact($finds, 'finds'))
            ->with(['districts' => $districts])
            ->with(['villages' => $villages])
            ->with(['cultures' => $cultures])
            ->with(['users' => $users])
            ->with(['topographies' => $topographies]);
    }

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
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
        $topographies = Topographie::pluck('name', 'id')->toArray();
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['topographies'] = Helper::phpArrayToPostgresArray($data['topographies']);
        $data['cultures'] = Helper::phpArrayToPostgresArray($data['cultures']);
        $data['authors'] = Helper::phpArrayToPostgresArray($data['authors']);
        $data['photos'] = [];
        foreach ($request->photos as $photo) {
            $data['photos'][] = $this->imageService->save($photo, 'other', false);

        }
        $data['photos'] = Helper::phpArrayToPostgresArray($data['photos']);
        $item = new Post($data);
        $item->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);
            $post['topographies'] =  PostgresArray::accessPgArray($post['topographies']);
            $post['authors'] =  PostgresArray::accessPgArray($post['authors']);
            $post['cultures'] =  PostgresArray::accessPgArray($post['cultures']);
       $post['photos'] =  PostgresArray::accessPgArray($post['photos']);


        //dd($posts);
        $objects = Objects::all();
        // dd($object_count);

        $finds = Find::get(['id','material_id','culture_id','post_id']);
        // dd($finds);

        $districts = District::pluck('name', 'code')->toArray();
        $villages = Village::pluck( 'name', 'id')->toArray();
        $topographies = Topographie::pluck('name',  'id')->toArray();
        $users = User::pluck('name')->toArray();
        $cultures = Culture::pluck('name')->toArray();
        //dd($posts);
        return view('post.show')
            ->with(compact($objects, 'objects'))
            ->with(compact($post, 'post'))
            ->with(compact($finds, 'finds'))
            ->with(['districts' => $districts])
            ->with(['villages' => $villages])
            ->with(['cultures' => $cultures])
            ->with(['users' => $users])
            ->with(['topographies' => $topographies]);

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
     * @param Request $request
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
