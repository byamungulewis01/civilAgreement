<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Civilian;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    // index
    public function index()
    {
        $agreements = Agreement::where('partyOne', auth()->guard('civilian')->user()->id)->orWhere('partyTwo', auth()->guard('civilian')->user()->id)->orderBy('id', 'desc')->get();
        return view('civilian.agreement.agreement', compact('agreements'));
    }
    public function show($id)
    {
        $agreement = Agreement::findorfail($id);
        return view('civilian.agreement.show', compact('agreement'));
    }
    //create
    public function create()
    {
        return view('civilian.agreement.create');
    }
    // store
    public function store(Request $request)
    {
      $formData = $request->validate([
        'whoToPay' => 'required',
        'amount' => 'required|numeric',
        'duration' => 'required',
        'category' => 'required',
        'description' => 'required',
        'partyTwo' => 'required',
      ]);
      $civilian = Civilian::where('national_id', $request->partyTwo)->first();
        if (!$civilian) {
            return back()->with('error', 'Civilian not found');
        }
        if ($civilian->id == auth()->guard('civilian')->user()->id) {
            return back()->with('error', 'You cannot create an agreement with yourself');
        }
       $formData['partyOne'] = auth()->guard('civilian')->user()->id;
       $formData['created_by'] = auth()->guard('civilian')->user()->id;
       $formData['partyTwo'] = $civilian->id;

       Agreement::create($formData);
       return redirect()->route('civilian.agreement.index')->with('success', 'Agreement created successfully');
    }
    // edit
    public function edit($id)
    {
        $agreement = Agreement::findorfail($id);
        return view('civilian.agreement.edit', compact('agreement'));
    }
    // update
    public function update(Request $request, $id)
    {
        $formData = $request->validate([
            'whoToPay' => 'required',
            'amount' => 'required|numeric',
            'duration' => 'required',
            'category' => 'required',
            'description' => 'required',
            'partyTwo' => 'required',
          ]);
          $civilian = Civilian::where('national_id', $request->partyTwo)->first();
            if (!$civilian) {
                return back()->with('error', 'Civilian not found');
            }
            if ($civilian->id == auth()->guard('civilian')->user()->id) {
                return back()->with('error', 'You cannot create an agreement with yourself');
            }
           $formData['partyOne'] = auth()->guard('civilian')->user()->id;
           $formData['created_by'] = auth()->guard('civilian')->user()->id;
           $formData['partyTwo'] = $civilian->id;

           Agreement::findorfail($id)->update($formData);
           return redirect()->route('civilian.agreement.index')->with('success', 'Agreement updated successfully');
    }
    // accept
    public function accept($id)
    {
        $agreement = Agreement::findorfail($id);
        if ($agreement->partyTwo != auth()->guard('civilian')->user()->id) {
            return back()->with('error', 'You cannot accept this agreement');
        }
        $agreement->update([
            'status' => 'accepted',
            'acceptedDate' => now(),
        ]);
        return back()->with('success', 'Agreement accepted successfully');
    }
    // reject
    public function reject($id)
    {
        $agreement = Agreement::findorfail($id);
        if ($agreement->partyTwo != auth()->guard('civilian')->user()->id) {
            return back()->with('error', 'You cannot reject this agreement');
        }
        $agreement->update([
            'status' => 'rejected',
            'rejectedDate' => now(),
        ]);
        return back()->with('success', 'Agreement rejected successfully');
    }

}
