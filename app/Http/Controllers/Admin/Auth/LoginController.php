<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\{Auth, Session};
use Illuminate\Http\Request;
use Illuminate\View\View as TypeView;
use Illuminate\Http\RedirectResponse;


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
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function showAdminLoginForm(): TypeView
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('error', 'Email or password are wrong.');
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        if(Auth::guard('admin')->check())
        {
            Session::flush();
            Auth::guard('admin')->logout();
            return redirect('/');
        }
    }
}
