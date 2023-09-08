<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewAccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('admin.users.index',compact('users'));
    }
    public function active()
    {
        $users = User::where('status',1)->orderBy('id','desc')->get();
        return view('admin.users.index',compact('users'));
    }
    public function inactive()
    {
        $users = User::where('status',2)->orderBy('id','desc')->get();
        return view('admin.users.index',compact('users'));
    }
    public function disactive()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.users.index',compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'phone' => 'required|numeric|digits:10|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'role' => 'required'

        ]);

        $password = Str::random(6);
        $request->merge([
            'role' => (string)$request->role,
            'password' => $password
        ]);
        $user = User::create($request->all());
        // try {
        //     Mail::to($user->email)->send(new NewAccount($user->email, $password));
        // } catch (\Exception $e) {}
        return to_route('admin.users.index')->with('success','User Created Successfully');
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'phone' => 'required|numeric|digits:10|unique:civilians,phone,'.$id,
            'email' => 'required|email|unique:civilians,email,'.$id,
            'status' => 'required',
            'role' => 'required'
        ]);
         $request->merge([
            'role' => $request->role,
        ]);

        User::findorfail($id)->update($request->all());

        return to_route('admin.users.index')->with('success','User Updated Successfully');
    }
    // destroy
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return to_route('admin.users.index')->with('success','User Deleted Successfully');
    }
    public function activate($id)
    {
        User::withTrashed()->findorfail($id)->restore();
        return back()->with('success', 'Civilian Activated Successfully');
    }
}
