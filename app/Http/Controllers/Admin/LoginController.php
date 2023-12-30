<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
    }
    

    public function index()
    {
        return view('backend.login');
    }

    public function authenticate(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user_details = User::where('email', $request->email)->first();

        if (isset($user_details->id)) {
            // Attempt to log the user in
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1], $request->remember)) {
                // If successful, then redirect to their intended location
                return redirect()->route('admin.dashboard');
            } else {
                // If authentication fails, redirect back with an error message
                return redirect()->back()->with('error', 'Invalid email or password.')->withErrors(['password' => 'Invalid password']);
            }
        } else {
            // If the user is not found, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid email or password.')->withErrors(['email' => 'Invalid email']);
        }
    }

    public function logout() 
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.home');
    }


}
