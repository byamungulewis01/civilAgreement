<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    //index
    public function index()
    {
        return view('admin-auth.index');
    }
    // login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            # check if user status is inactive
            // if (auth()->user()->status == 'inactive') {
            //     auth()->logout();
            //     return redirect()->route('admin.login')->with('error', 'Your account is inactive. Please contact the administrator.');
            // }

            if (auth()->user()->password == '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi') {
                return redirect()->route('admin.reset-password');
            }
            if (auth()->user()->password_reseted) {
                return redirect()->route('admin.reset-password');
            }
            return redirect()->route('admin.dash.index');
        }
        return redirect()->route('admin.index')->with('error', 'Invalid Credentials');
    }
    // forgot password
    public function forgotPassword()
    {
        return view('admin-auth.forgetPassword');
    }
    // sendMail
    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email does not exist!');
        }
        $password = rand(100000, 999999);
        $user->update([
            'password' => Hash::make($password),
            'password_reseted' => true,
        ]);
        Mail::send('emails.admin-resetPassword', ['name' => $user->name, 'password' => $password], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Password Notification');
        });
        return redirect()->route('admin.sendMailSuccess')->with('sentEmail', 'Reset password link sent to your email.');
    }
    // sendMailSuccess
    public function sendMailSuccess()
    {
        return view('admin-auth.sendMail');
    }

    // reset password
    public function resetPassword()
    {
        return view('admin-auth.resetPassword');
    }
    public function changePasswordStore(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        # check if new password is same as old password
        if ((Hash::check($request->get('password'), auth()->user()->password))) {
            return redirect()->back()->with('error', 'Your current password matches with the password you provided. Please try again.');
        }
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->password_reseted = false;
        $user->save();
        #logout the user
        auth()->logout();
        # redirect to login page
        return redirect()->route('admin.index')->with('success', 'Password changed successfully!');
    }
    // logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.index');
    }

}
