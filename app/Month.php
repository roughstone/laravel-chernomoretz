<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\MonthHelper;

class Month extends Model
{
    protected $table = 'months';
    protected $fillable = [
        'athlete_id', 'date', 'active', 'paid',
    ];
    public function payment() {
        return $this->hasMany('App\Payment');
    }
}
