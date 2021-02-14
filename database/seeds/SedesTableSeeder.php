<?php

use App\Model\Sede;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::truncate();
        $date = Carbon::create(null, null, null, '9', '0', '0');

        $sede = Sede::create([
            'name' => 'Sede 1',
            'address' => 'Dirección 1',
            'start_time' => $date
        ]);
        $sede = Sede::create([
            'name' => 'Sede 2',
            'address' => 'Dirección 2',
            'start_time' => $date
        ]);
        $sede = Sede::create([
            'name' => 'Sede 3',
            'address' => 'Dirección 3',
            'start_time' => $date
        ]);


    }
}
