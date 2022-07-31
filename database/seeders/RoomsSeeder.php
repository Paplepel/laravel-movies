<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room();
        $room->cinema_id = 1;
        $room->name = 'Festive Cine 1';
        $room->seats = 30;
        $room->save();

        $room = new Room();
        $room->cinema_id = 1;
        $room->name = 'Festive Cine 2';
        $room->seats = 30;
        $room->save();

        $room = new Room();
        $room->cinema_id = 2;
        $room->name = 'Grand Cine 1';
        $room->seats = 30;
        $room->save();

        $room = new Room();
        $room->cinema_id = 2;
        $room->name = 'Grand Cine 2';
        $room->seats = 30;
        $room->save();
    }
}
