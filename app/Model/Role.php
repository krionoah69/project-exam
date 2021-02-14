<?php

namespace App\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Generate relation many-to-many Role and User
     * 
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
