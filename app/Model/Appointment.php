<?php

namespace App\Model;

use App\Model\User;
use App\Model\Role;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'available', 'user'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sede() {
        return $this->belongsTo(Sede::class);
    }
    
}
