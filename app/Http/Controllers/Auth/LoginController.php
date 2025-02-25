<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        if (url()->previous() != url()->current()){
            Redirect::setIntendedUrl(url()->previous());
        }

        return view('auth.login');
    }
}
