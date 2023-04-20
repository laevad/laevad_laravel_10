<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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


    protected function redirectTo()
    {
        if (auth('web')->user()->role_id == Role::where('name', 'admin')->first()->id) {
            return route('admin.dashboard');
        }
        if (auth('web')->user()->role_id == Role::where('name', 'user')->first()->id) {
            return route('user.dashboard');
        }

        return redirect()->route('login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /*login*/
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        /*filter_var email*/
        if (filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            if (auth('web')->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                if (auth('web')->user()->role_id == Role::where('name', 'admin')->first()->id) {
                    return redirect()->route('admin.dashboard');
                }
                if (auth('web')->user()->role_id == Role::where('name', 'user')->first()->id) {
                    return redirect()->route('user.dashboard');
                }
            }
        } else {
            if (auth()->attempt(array('username' => $input['email'], 'password' => $input['password']))) {
                if (auth('web')->user()->role_id == Role::where('name', 'admin')->first()->id) {
                    return redirect()->route('admin.dashboard');
                }
                if (auth('web')->user()->role_id == Role::where('name', 'user')->first()->id) {
                    return redirect()->route('user.dashboard');
                }
            }
        }
        return redirect()->back()->withInput($request->input())->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
