<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Month;
use App\Helpers\MonthHelper;

class Athlete extends Model
{
    protected $table = 'athletes';
    protected $fillable = [
        'f_name', 'm_name', 'l_name', 'parent_names', 'viber', 'image',
    ];
    public function months() {
        return $this->hasMany('App\Month');
    }
}
