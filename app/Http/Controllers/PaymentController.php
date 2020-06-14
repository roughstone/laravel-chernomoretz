<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $athlete = new Payment();
            $athlete->month_id = $id;
            if (strrpos($request->get('amount'), '.' > -1)) {
                $amount = floatval($request->get('amount').'.00');
            }
            $athlete->reason = $request->get('reason');
            $athlete->amount = $amount;
            return redirect()->back();
        } catch (\Throwable $th) {
            $request->session()->flash('msg', 'Възникна грешка! Моля опитайте отново!');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        if (!empty($request->get('record'))) {
            $payment->update([
                $request->get('record') => (int)$request->get('update')
            ]);
            return response()->json(['status' => 200, 'msg' => 'ok']);
        }

        if(!empty($request->get('reason'))) {
            $payment->update([
                'reason' => $request->get('reason'),
                'amount' => floatval($request->get('amount'))
            ]);
            return response()->json(['status' => 200, 'msg' => 'ok']);
        }
    }
}
