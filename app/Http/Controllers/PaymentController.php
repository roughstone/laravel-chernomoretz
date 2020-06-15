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
            $payment = new Payment();
            $payment->month_id = $id;
            $payment->reason = $request->get('reason');
            $payment->amount = $request->get('amount');
            $payment->save();
            return response()->json(['status' => 200, 'msg' => 'ok']);
        } catch (\Throwable $th) {
            $request->session()->flash('msg', 'Възникна грешка! Моля опитайте отново!');
            return response()->json(['status' => 500, 'error' => $th]);
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
