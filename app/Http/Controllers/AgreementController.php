<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Civilian;
use App\Models\Payment;
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

        $payments = Payment::where('agreement_id', $id)->where('type', 'deposit')->orderBy('created_at', 'desc')->get();
        $withdrawals = Payment::where('agreement_id', $id)->where('type', 'withdrawal')->orderBy('created_at', 'desc')->get();
        return view('civilian.agreement.show', compact('agreement', 'payments', 'withdrawals'));
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

    // paymentStore
    public function paymentStore(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
        ]);
       $agreement = Agreement::findorfail($id);
       $payAmount = Payment::where('agreement_id', $agreement->id)->sum('amount');
       //check if payment is done
         if ($payAmount >= $agreement->amount) {
              return back()->with('error', 'Payment already done');
         }
        Payment::create([
            'agreement_id' =>$id,
            'type' => 'deposit',
            'amount' => $request->amount,
        ]);
        return back()->with('success', 'Payment done successfully');

    }
    // withdrawal
    public function withdrawal(Request $request, $id)
    {
    //    if request amount is 0
        if ($request->amount == 0) {
            return back()->with('error', 'Amount cannot be 0');
        }
        Payment::create([
            'agreement_id' =>$id,
            'type' => 'withdrawal',
            'amount' => $request->amount,
        ]);
        return back()->with('success', 'Withdrawal done successfully');

    }

}
