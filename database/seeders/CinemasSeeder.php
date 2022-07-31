<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cinema;

class CinemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinema = new Cinema();
        $cinema->name = 'Festival Mall';
        $cinema->location = 'Kempton Park';
        $cinema->save();

        $cinema = new Cinema();
        $cinema->name = 'Grandwest';
        $cinema->location = 'Cape Town';
        $cinema->save();
    }
}
