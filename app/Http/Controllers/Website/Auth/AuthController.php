<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Auth\LoginRequest;
use App\Http\Requests\Website\Auth\RegisterRequest;
use App\Http\Requests\Website\Auth\UpdateProfileRequest;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /** Register form*/
    public function registerForm()
    {
        return view('website.auth.register');
    }

    /** Submit Register*/
    public function registerSubmit(RegisterRequest $request)
    {
        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect(route('login'));
    }

    /** Login form*/
    public function LoginForm()
    {
        return view('website.auth.login');
    }

    /** Submit Login*/
    public function loginSubmit(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }
        return back()->with('error', 'The email or password is incorrect.')
                     ->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    /** user profile*/
    public function profile()
    {
        $user = auth()->user();
        return view('website.user.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->only('name', 'email');
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }
        auth()->user()->update($data);
        return back()->with('success', 'Your profile data updated successfully');
    }

}
