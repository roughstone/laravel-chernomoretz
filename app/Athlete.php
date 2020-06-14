<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $table = 'athletes';
    protected $fillable = [
        'f_name', 'm_name', 'l_name', 'parent_names', 'viber', 'image',
    ];
    public function months() {
        return $this->hasMany('App\Month');
    }
    public function payments() {
        return $this->hasManyThrough('App\Payment', 'App\Month');
    }
}
