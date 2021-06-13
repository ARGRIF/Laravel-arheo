<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var ImageService
     */
    private $imageService;

    /**
     * @var ImageService
     */


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($this->create($request)));

        return redirect()->route('home');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->middleware('guest');
        $this->imageService = $imageService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => [ 'required','regex:/^(\+380)[0-9]{9}$/'],
            'position_at_work' => ['required', 'string','min:5', 'max:255'],
            'specialization' => ['required', 'string','min:5', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => [],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $data = $request->all();
        //dd($request->avatar);
        if($request->avatar){
            //dd($request->avatar);
            $data['avatar'] = $this->imageService->save($request->avatar, 'avatars', true);
        }

        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
}
