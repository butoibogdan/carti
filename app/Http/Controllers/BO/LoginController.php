<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
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
    protected $redirectTo = '/auth/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showAdminLoginForm() {
        return view('BO.login');
    }

    public function adminLoginPost(Request $request) {
        //dd($request->all());
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'usertype'=>1])) {
            return redirect('/auth/dashboard');
        } else {
            return back()->with('flash_type', 'alert-danger');
        }
    }

    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }
    

}
