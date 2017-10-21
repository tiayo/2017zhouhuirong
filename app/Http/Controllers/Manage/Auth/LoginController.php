<?php

namespace App\Http\Controllers\Manage\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->redirectTo = route('manage');

        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('manage.auth.login');
    }
}
