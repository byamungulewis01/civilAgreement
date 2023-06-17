<?php

namespace App\Http\Controllers;

use App\Models\Civilian;
use Illuminate\Http\Request;

class CivilianAuthController extends Controller
{
    //index
    public function index()
    {
        return view('civilian-auth.index');
    }
    // register
    public function register()
    {
        return view('civilian-auth.register');
    }
    // forgot password
    public function forgotPassword()
    {
        return view('civilian-auth.forgot-password');
    }
    // reset password
    public function resetPassword()
    {
        return view('civilian-auth.reset-password');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->guard('civilian')->attempt($credentials)) {
            return redirect()->route('civilian.dash.index');
        }
        return redirect()->route('civilian.auth.index')->with('error', 'Invalid credentials');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'phone' => 'required|numeric|digits:9|unique:civilians,phone',
            'email' => 'required|email|unique:civilians,email',
            'password' => 'required|min:6',
            'national_id' => 'required|numeric|digits:16|unique:civilians,national_id',
            'national_id_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->national_id_image->extension();
        $request->national_id_image->move(public_path('images'), $imageName);
        $request->merge([
            'password' => bcrypt($request->password),
            'national_id_image' => $imageName,
        ]);
        $civilian = Civilian::create($request->all());
        auth()->guard('civilian')->login($civilian);
        return redirect()->route('civilian.dash.index');
    }
    // logout
    public function logout()
    {
        auth()->guard('civilian')->logout();
        return redirect()->route('civilian.auth.index');
    }

}
