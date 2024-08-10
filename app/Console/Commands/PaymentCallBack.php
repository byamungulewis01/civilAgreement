<?php

namespace App\Console\Commands;

use Paypack\Paypack;
use App\Models\Payment;
use App\Models\Agreement;
use App\Models\Transaction;
use Illuminate\Console\Command;

class PaymentCallBack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:payment-call-back';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Payment Call back';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $paypack = new Paypack();
        $paypack->config([
            'client_id' => env('PAYPACK_CLIENT_ID'),
            'client_secret' => env('PAYPACK_CLIENT_SECRET'),
        ]);

        $transactions = Transaction::where('status', 'new')->get();
        // $transactions =Transaction::find(1);
        // $transaction = $paypack->Events(['ref' => $transactions->ref]);
        // $status = $transaction['transactions'][0]['data']['status'];
        // $this->info($status);
        // die();
        // $this->info($transactions);
        // die();
        foreach ($transactions as $item) {

            $transaction = $paypack->Events(['ref' => $item->ref]);
            $status = $transaction['transactions'][0]['data']['status'];


            if ($status == 'successful') {
                Payment::create([
                    'agreement_id' => $item->agreement_id,
                    'type' => 'deposit',
                    'amount' => $item->amount,
                    'transactionReference' => $item->ref,
                ]);
                $payed = Payment::where('agreement_id', $item->agreement_id)->sum('amount');
                if ($payed >= $item->amount) {
                    Agreement::find($item->agreement_id)->update(['status' => 'completed', 'completedDate' => now()]);
                }
                $item->update(['status' => 'complete']);
            }
        }
        // $this->info('Test is done');
    }
}
