<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\User\LoginUserRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.frontsite.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginUserRequest $request)
    {
        $data = $request->all();

        $user = User::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            $request->session()->regenerate();

            Session::put('guard', 'web');

            Auth::login($user);

            toastr()->success('Login berhasil!');

            return redirect()->route('index');
        }

        if (Auth::guard('petugas')->attempt(['email' => $data['email'], 'password' => $data['password']], $request->has('remember') ? true : false)) {
            $request->session()->regenerate();

            Session::put('guard', 'petugas');

            toastr()->success('Login berhasil!');

            return redirect()->intended(route('backsite.dashboard.index'));
        } else {

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
