<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Agreement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CivilAgreements extends Controller
{
    public function index()
    {
        $agreements = Agreement::orderBy('id', 'desc')->get();
        // dd($agreements);
        return view('admin.agreements.index', compact('agreements'));
    }
    public function show($id)
    {
        $agreement = Agreement::findorfail($id);

        $payments = Payment::where('agreement_id', $id)->where('type', 'deposit')->orderBy('created_at', 'desc')->get();
        $withdrawals = Payment::where('agreement_id', $id)->where('type', 'withdrawal')->orderBy('created_at', 'desc')->get();
        return view('admin.agreements.show', compact('agreement', 'payments', 'withdrawals'));
    }

    public function pending()
    {
        $agreements = Agreement::where('status', 'pending')->orderBy('id', 'desc')->get();
        return view('admin.agreements.index', compact('agreements'));
    }
    public function accepted()
    {
        $agreements = Agreement::where('status', 'accepted')->orderBy('id', 'desc')->get();
        return view('admin.agreements.index', compact('agreements'));
    }
    public function completed()
    {
        $agreements = Agreement::where('status', 'completed')->orderBy('id', 'desc')->get();
        return view('admin.agreements.index', compact('agreements'));
    }
    public function print($id)
    {
        $agreement = Agreement::findorfail($id);

        $pdf = Pdf::loadView('admin.agreements.print', compact('agreement'))
            ->setPaper('a4', 'portrait');
        return $pdf->stream(time() . '.pdf');
    }
}
