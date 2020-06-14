<?php

namespace App\Http\Controllers;

use App\Athlete;
use Illuminate\Http\Request;
use App\Helpers\MonthHelper;
use App\Models\AthleteModel;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AthleteModel = new AthleteModel(Athlete::all());
        $athletes = $AthleteModel->getCurrentThreeMonths();
        /* dd($athletes); */
        return view('athletes/index', ['dataset' => $athletes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('athletes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $athlete = new Athlete();
            $athlete->f_name = $request->get('f_name');
            $athlete->m_name = $request->get('m_name');
            $athlete->l_name = $request->get('l_name');
            $athlete->parent_names = $request->get('parent_names');
            $athlete->viber = $request->get('viber');
            $athlete->image = $request->get('image');
            $athlete->save();
            $helper = new MonthHelper();
            $helper->addDates([
                date("Y-m-d", strtotime("last month")),
                date("Y-m-d"),
                date("Y-m-d", strtotime("next month"))
            ], [$athlete]);
            return redirect('athletes');
        } catch (\Throwable $th) {
            $request->session()->flash('msg', 'Възникна грешка! Моля опитайте отново!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        $AthleteModel = new AthleteModel([$athlete]);
        $addThreeMonths = $AthleteModel->getCurrentThreeMonths();
        $AthleteModel = new AthleteModel($addThreeMonths);
        $current_athlete = $AthleteModel->allMonths();
        foreach ($current_athlete[0]->payments as $payment) {
            $payment->month;
        }
        return view('athletes/show', ['data' => $current_athlete[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit(Athlete $athlete)
    {
        return view('athletes/create', ['data' => $athlete]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        try {
            $athlete->update([
                'f_name' => $request->get('f_name'),
                'm_name'=> $request->get('m_name'),
                'l_name'=> $request->get('l_name'),
                'parent_names'=> $request->get('parent_names'),
                'viber'=> $request->get('viber'),
                'image'=> $request->get('image'),
            ]);
            return redirect('athletes');
        } catch (\Throwable $th) {
            $request->session()->flash('msg', 'Възникна грешка! Моля опитайте отново!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
