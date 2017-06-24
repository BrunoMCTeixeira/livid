<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Socialite;

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
	protected $redirectTo = '/';
	

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user)
    {
		$this->user = $user;	
        $this->middleware('guest')->except('logout');
    }
	
	
	public function redirectToProvider($provider)
    {
		
		$facebook = ['first_name', 'last_name', 'email', 'gender', 'user_birthday', 'user_location', 'public_profile'];
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
	
	public function show()
	{
		return view('features.users.sign-in.index');
	}
	
	
    public function handleProviderCallback($provider)
    {
        $user     = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findUser($user, $provider);
       
		if($authUser):
			Auth::login($authUser);
			return redirect($this->redirectTo);	
		endif;
		
		return redirect()->route('signup');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findUser($user, $provider)
    {	
		$emailUser = $this->user->findByField('email', $user->email);
		
		if($emailUser):			
			$this->user->update([ $provider . '_token' => $user->id], $emailUser);

			return $emailUser;
		endif;
		
		$authUser = $this->user->findByField($provider . '_token', $user->id);
        
		if ($authUser):
			return $authUser;
		endif;
		
		$name = explode(' ', $user->name);
		
		$userInformation = [
			'name'               => $name[0],
			'lastname'           => end($name),
			'email'              => $user->email,
			$provider . '_token' => $user->id
		];
		
		session([ 'user_signup' => $userInformation ]);
    }
}
