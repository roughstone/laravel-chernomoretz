<?php

namespace App\Models;

use App\Helpers\MonthHelper;
use App\Month;

class AthleteModel
{
    public function __construct($athletes)
    {
        $this->athletes = $athletes;
    }
    public function getCurrentThreeMonths() {
        $i = 0;
        foreach ($this->athletes as $athlete) {
            $months = Month::where('athlete_id', $athlete->id)->where(function ($query) {
                return $query->where('date', 'like', date("Y-m", strtotime("last month")).'%')
                ->orWhere('date', 'like', date("Y-m").'%')
                ->orWhere('date', 'like', date("Y-m", strtotime("next month")).'%')->get();
            })->get();
            $this->athletes[$i]->currentThreeMonths = $months;
            $i++;
        }
        return $this->athletes;
    }
    public function allMonths() {
        $i = 0;
        foreach ($this->athletes as $athlete) {
            $months = Month::where('athlete_id', $athlete->id)->orderBy('date', 'asc')->get();
            $this->athletes[$i]->allMonths = $months;
            $i++;
        }
        return $this->athletes;
    }
}
