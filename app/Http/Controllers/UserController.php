<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('profile');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'role' => 'required|max:2',
            'name' => 'required|max:65000',
            'lastname' => 'required|max:65000',
            'email' => 'required|email|unique',
            'username' => 'required|unique|max:32'
        ]);

        if ($request->role == 1) {

        }
    }

    public function addFacebookId() {

    }

    public function addGmailId() {

    }

}
