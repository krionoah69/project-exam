<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Appointment;
use App\Model\Sede;
use App\Model\User;
use App\Model\Role;
use Carbon\Carbon;

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {   
    $users = User::with('roles')->get();
    $sedes = Sede::all();
    $dateStart = Carbon::create(2021, 3, 1, '9', '0', '0');
    $sedeCount = 0;
    
    for ($d = 0; $d < 2; $d++) {

        for ($a = 0; $a < 45; $a++) {

            if ($sedeCount == 2){
                $sedeCount = 1;
            }
            $user_id = $users[0]->id;
            $sede_id = $sedes[$sedeCount]->id;
            $initial = $dateStart;
            
            for ($c = 0; $c < 24; $c++) {

                return [
                    'sede_id' => $sede_id,
                    'user_id' => $a,
                    'start_time' => $dateStart,
                    'end_time' => $initial->addMinutes(15),
                    'available' => true,
                ];

            }

            $dateStart = $initial;
            $sedeCount++;
            
        }

        $dateStart->addDay();

    }


});