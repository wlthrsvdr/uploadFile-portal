<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Controller;

class AuthController extends Controller
{
    protected $data = array();

    public function __construct()
    {
        $this->middleware('system.guest', ['except' => "logout"]);
    }


    public function login(Request $request, $redirect_uri = NULL)
    {
        return view('admin.pages.login', $this->data);
    }

    public function authenticate(Request $request, $redirect_uri = NULL)
    {

        $credentials = $request->only('email', 'password');


        if (Auth::guard('admin')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'user_role' => "admin"])) {

            if ($redirect_uri and session()->has($redirect_uri)) {
                return redirect(session()->get($redirect_uri));
            }

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Welcome back!");
            return redirect()->route('admin.dashboard');
        } 

        session()->flash('notification-status', "failed");
        session()->flash('notification-msg', "Invalid username or password.");
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "You have been logged out from the system");
        return redirect()->route('admin.login');
    }
}
