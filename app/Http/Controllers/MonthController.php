<?php

namespace App\Http\Controllers;

use App\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(Month $month)
    {
        $month->athlete = $month->athlete;
        return view('months/show',['data' => $month]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Month $month)
    {
        try {
            $month->update([
                $request->get('record') => (int)$request->get('update')
            ]);
            return response()->json(['status' => 200, 'msg' => 'ok']);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }
}
