<?php

namespace App\Model;

use App\Model\Appointment;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name','address','start_time'
    ];


    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
