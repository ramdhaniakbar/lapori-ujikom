<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        Session::forget('guard');
        $request->session()->invalidate();

        toastr()->success('Logout berhasil!');

        return redirect()->route('index')->withCookie(cookie('remember_token', null, 0));
    }
}
