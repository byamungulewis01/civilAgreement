<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashController extends Controller
{
    //index
    public function index()
    {
        return view('admin.index');
    }
    // profile
    public function profile()
    {
        return view('admin.profile');
    }
    public function security()
    {
        return view('admin.profile');
    }
    public function deleteAccount()
    {
        return view('admin.profile');
    }
    // updateProfile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|min:3|max:255',
            'lastName' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'phone' => 'required|numeric|digits:9|unique:users,phone,'.auth()->user()->id,
        ]);
        $request->merge([
            'name' => $request->firstName.' '.$request->lastName,
        ]);
        User::find(auth()->user()->id)->update($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    // changePassword
    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        # check if provided current password is correct
        if (!(Hash::check($request->get('currentPassword'), auth()->user()->password))) {
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        # check if new password is same as old password
        if ((Hash::check($request->get('password'), auth()->user()->password))) {
            return redirect()->back()->with('error', 'Your current password matches with the password you provided. Please try again.');
        }
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password changed successfully');
    }
    // deleteAccountStore
    public function deleteAccountStore(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        # check if provided current password is correct
        if (!(Hash::check($request->get('password'), auth()->user()->password))) {
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }
        # delete the user
        User::find(auth()->user()->id)->delete();
        #logout the user
        auth()->logout();
        # redirect to login page
        return redirect()->route('admin.index')->with('success', 'Account deleted successfully!');
    }
}

