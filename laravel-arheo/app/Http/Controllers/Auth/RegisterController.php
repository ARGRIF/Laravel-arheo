<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

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
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'position_at_work' => ['required', 'string','min:10', 'max:255'],
            'specialization' => ['required', 'string','min:10', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => [],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = app('request');
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.jpg';
            $avatar_size = getimagesize($avatar);
            Image::make($avatar)->crop($avatar_size[0], $avatar_size[0])->resize(500, 500)->save( public_path('/uploads/avatars/' . $filename) );
        }
        else{
            $filename = 'default.jpg';
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'position_at_work' => $data['position_at_work'],
            'specialization' => $data['specialization'],
            'password' => Hash::make($data['password']),
            'avatar' => $filename,
        ]);
    }
}
