<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	protected $redirectTo = '/';
	
	public function redirectToProvider($provider)
    {
		
		$facebook = ['first_name', 'last_name', 'email', 'gender', 'birthday', 'user_location', 'public_profile'];
		$google   = ['first_name', 'last_name', 'email', 'gender', 'birthday'];
		$fields   = ($provider == 'facebook') ? $facebook : $google;
		
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user     = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
       
		Auth::login($authUser);
        
		return redirect($this->redirectTo);	
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {	
		$authUser = User::where($provider . '_token', $user->id)->first();
        
		if ($authUser) { return $authUser; }
		
		// User creation	
		$fullName   = explode(' ', $user->name);
		$firstName  = $fullName[0];
		$provider  .= '_token';
		
		$user = new User;
		
		$user->name        = $firstName;
		$user->lastname    = end($fullName);
		$user->email       = $user->email;
		$user->password    = bcrypt('teste');
		$user->$provider   = $user->id;
		$user->username    = $firstName . $lastName . str_random(5);
		$user->country_id  = 'PT';
		
		$user->save();
		
		return $user;
    }
}
