<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserSignupRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
    
    public function create()
    {
        return view('features.users.sign-up.index');
    }
	
	public function store(Request $request)
	{	
		$request->request->add(['username' => $request->name . $request->lastname . str_random(10)]);
		
		$user = $this->user->create($request->all());
		
		Auth::login($user, true);
		
		return redirect($this->redirectTo);	
	}
	
}
