<?php

namespace App\Http\Controllers;

use App\Mail\NewAccount;
use App\Models\Civilian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CivilianRegistration extends Controller
{
    //index
    public function index()
    {
        $civilians = Civilian::orderBy('id', 'desc')->get();
        return view('admin.civilians.index', compact('civilians'));
    }
    public function active()
    {
        $civilians = Civilian::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.civilians.index', compact('civilians'));
    }
    public function inactive()
    {
        $civilians = Civilian::where('status', 2)->orderBy('id', 'desc')->get();
        return view('admin.civilians.index', compact('civilians'));
    }
    public function disactive()
    {
        $civilians = Civilian::onlyTrashed()->get();
        return view('admin.civilians.index', compact('civilians'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'phone' => 'required|numeric|digits:10|unique:civilians,phone',
            'email' => 'required|email|unique:civilians,email',
            'national_id' => 'required|numeric|digits:16|unique:civilians,national_id',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $imageName);
        }
        $password = Str::random(6);
        // $password = 12345678;
        $request->merge([
            'national_id_image' => $imageName,
            'password' => $password,
            'user_id' => auth()->user()->id
        ]);
        $civil = Civilian::create($request->all());
        try {
            Mail::to($civil->email)->send(new NewAccount($civil->email, $password));
        } catch (\Exception $e) {
            return back()->with('error','Citizen Not Created Try Again');
        }
        return to_route('admin.civilian.index')->with('success', 'Citizen Created Successfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'phone' => 'required|numeric|digits:10|unique:civilians,phone,' . $id,
            'email' => 'required|email|unique:civilians,email,' . $id,
            'national_id' => 'required|numeric|digits:16|unique:civilians,national_id,' . $id,
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $imageName);
            $request->merge(['national_id_image' => $imageName]);
        }

        Civilian::findorfail($id)->update($request->all());

        return to_route('admin.civilian.index')->with('success', 'Civilian Updated Successfully');
    }
    // destroy
    public function destroy($id)
    {
        $civil = Civilian::findorfail($id);
        $civil->status = 3;
        $civil->save();
        $civil->delete();

        return to_route('admin.civilian.index')->with('success', 'Civilian Deleted Successfully');
    }
    public function activate($id)
    {
        Civilian::withTrashed()->findorfail($id)->restore();
        return back()->with('success', 'Civilian Activated Successfully');
    }

}
