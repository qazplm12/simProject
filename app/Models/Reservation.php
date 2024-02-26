<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['car_id', 'start_date', 'end_date'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
