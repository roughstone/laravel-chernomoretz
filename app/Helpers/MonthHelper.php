<?php

namespace App\Helpers;

use App\Athlete;
use App\Month;

class MonthHelper
{
    /**
     * Store a newly created Month record in DB.
     *
     * @param  int  $id
     * @param  string  $date optional
     * @return void
     */
    private function checkAndCreteMonthIfEmpty($id, $date_bg, $date) {
        try {
            if (count(Month::where('athlete_id', $id)->where('date', $date_bg)->get()) == 0) {
                $object = new Month();
                $object->athlete_id = $id;
                $object->date_bg = $date_bg;
                $object->date = $date;
                $object->save();
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    private function getYear($date) {
        switch ($date) {
            case gettype(strpos($date, date('Y', strtotime("last year")))) == "integer":
                return date("Y", strtotime("last year"));
                break;
            case 'value':
                return date("Y", strtotime("next year"));
                break;
            default:
                return date("Y");
                break;
        }
    }

    /**
     * Replace English with Bulgarian Month
     *
     * @param date $date
     * @return string $date_bg
     */
    public function changeMonthsToBg($date) {
        switch ($date) {
            case gettype(strpos($date, '-01-')) == "integer":
                return  'Януари '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-02-')) == "integer":
                return  'Февруари '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-03-')) == "integer":
                return  'Mарт '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-04-')) == "integer":
                return  'Април '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-05-')) == "integer":
                return  'Май '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-06-')) == "integer":
                return  'Юни '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-07-')) == "integer":
                return  'Юли '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-08-')) == "integer":
                return  'Август '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-09-')) == "integer":
                return  'Септември '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-10-')) == "integer":
                return  'Октомври '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-11-')) == "integer":
                return  'Ноември '.$this->getYear($date);
                break;
            case gettype(strpos($date, '-12-')) == "integer":
                return  'Декемри '.$this->getYear($date);
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * Prepare newly created Month records for DB.
     *
     * @param  array  $datesArray format ("F Y")
     * @param  array  $athletesArray optional App\Athlete
     * @return void
     */
    public function addDates($datesArray, $athletesArray = []) {
        $dates = $datesArray;
        $athletes = Athlete::all();
        $dates_bg = [];
        if(count($athletesArray) > 0) {
            $athletes = $athletesArray;
        }
        foreach ($dates as $date) {
            $date_bg = $this->changeMonthsToBg($date);
            array_push($dates_bg, $date_bg);
        };
        foreach ($athletes as $athlete) {
            $i = 0;
            foreach ($dates_bg as $date_bg) {
                $this->checkAndCreteMonthIfEmpty($athlete->id, $date_bg, $dates[$i]);
                $i++;
            }
        }
    }
}
