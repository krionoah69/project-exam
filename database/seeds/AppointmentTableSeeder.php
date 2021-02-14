<?php

use App\Model\Appointment;
use App\Model\User;
use App\Model\Sede;
use App\Model\Role;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointment::truncate();
        
        $users = User::where('id','!=','1')->get();
        $sedes = Sede::all();
        $sedeCount = 0;


        $initDate = Carbon::create(2021, 3, 1);
        $time = Carbon::create(null, null, null, '9', '0', '0');
        $timee = Carbon::create(null, null, null, '9', '0', '0');
        
        for ($d = 0; $d < 14; $d++) {

           
            foreach ($users as $user) {

                if ($sedeCount == 3) {
                    $sedeCount = 0;
                }

                $sede_id = $sedes[$sedeCount]->id;
                
                for ($c = 0; $c < 24; $c++) {

                    $ppointment = Appointment::create([
                        'sede_id' => $sede_id,
                        'user_id' => $user->id,
                        'date' => $initDate,
                        'start_time' => $time,
                        'end_time' => $timee->addMinutes(20),
                        'available' => true,
                    ]);
                    
                    $time->addMinutes(20);
                }

                $time = Carbon::create(null, null, null, '9', '0', '0');
                $timee = Carbon::create(null, null, null, '9', '0', '0');
                $sedeCount++;


            }
            $initDate->addDay();

            

        }
    }


}
