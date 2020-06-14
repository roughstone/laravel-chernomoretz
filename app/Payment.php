<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'reason', 'amount', 'active', 'paid'
    ];
    public function athlete() {
        return $this->hasOneThrough('App\Month', 'App\Payment');
    }
    public function month() {
        return $this->belongsTo('App\Month');
    }
}
