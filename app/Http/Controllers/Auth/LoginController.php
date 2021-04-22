<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// newly add be me
use Illuminate\Support\Facades\Auth;

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
//    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function redirectTo()
    {
        if(Auth::check() && Auth::user()->role->name == "Admin"){
//          $this->redirectTo = route('admin.dashboard');
            return 'admin/dashboard';
        }elseif((Auth::check() && Auth::user()->role->name == "Author")) {
//           $this->redirectTo = route('author.dashboard');
            return 'author/dashboard';
        }else {
            return '/login';
        }
    }



//    public function __construct()
//    {
//        if(Auth::check() && Auth::user()->role->name == "Admin"){
////            $this->redirectTo = route('admin.dashboard');
//            return 'admin/dashboard';
//        }elseif((Auth::check() && Auth::user()->role->name == "Author")) {
////            $this->redirectTo = route('author.dashboard');
//            return 'author/dashboard';
//        }else {
//            $this->middleware('guest')->except('logout');
//        }



//    }
}
