<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    // turn off timestamps

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'second_name',
        'debt',

    ];

    // calling stateFee method before save model

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->state_fee = $model->stateFee();
        });
    }

    // calculates 10% of the debt amount

    public function stateFee()
    {
        return $this->debt * 0.1;
    }
}
