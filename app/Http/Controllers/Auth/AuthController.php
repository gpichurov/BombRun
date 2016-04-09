<?php

namespace App\Http\Controllers\Auth;

//use Laravel\Socialite;
//use Laravel\Socialite\Facades\Socialite;
use App\Inventory;
use App\Statistic;
use Auth;
use Socialite;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Image;
use File;

class AuthController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:10|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Inventory::create(['user_id' => $newUser->id]);
        Statistic::create(['user_id' => $newUser->id]);

        return $newUser;
    }

    public function redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();
    }

    public function handleProviderCallback()
    {

        try {
            $user = Socialite::with('facebook')->user();
        } catch (Exception $e) {
            return redirect('/login/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/home');

    }
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('email', $facebookUser->email)->first();

        if ($authUser){
            return $authUser;
        }
        $newUser = User::create([
            'name' => $facebookUser->name . time(),
            'email' => $facebookUser->email,
            'password' => bcrypt($this->randomPassword()),
            'facebook_id' => $facebookUser->id,
            'big_avatar' => 'B_default.png',
            'small_avatar' => 'S_default.png',
        ]);
        Inventory::create(['user_id' => $newUser->id]);
        Statistic::create(['user_id' => $newUser->id]);
        $this->addFBImage($facebookUser, $newUser);

        return $newUser;
    }

    private function addFBImage($facebookUser, $newUser){
        $nameBig = 'B_' . time() . '_' . 'fb.jpg';
        $pathBig = storage_path('app/avatarImages/big/' . $nameBig);
        $nameSmall = 'S_' . time() . '_' . 'fb.jpg';
        $pathSmall = storage_path('app/avatarImages/small/' . $nameSmall);

        $url = preg_replace('/\bnormal\b/i', 'large', $facebookUser->avatar);

        Image::make( $url)->resize(150, 150)->save($pathBig);
        Image::make( $url)->resize(50, 50)->save($pathSmall);

        $newUser->big_avatar = $nameBig;
        $newUser->small_avatar = $nameSmall;
        $newUser->save();
    }

    private function randomPassword( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
}
