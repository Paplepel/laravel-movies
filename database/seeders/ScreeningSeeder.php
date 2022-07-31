<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Screening;

class ScreeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array (
            'RECORDS' =>
                array (
                    0 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '1',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '1',
                        ),
                    1 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '2',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '2',
                        ),
                    2 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '3',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '3',
                        ),
                    3 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '4',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '4',
                        ),
                    4 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '4',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '1',
                        ),
                    5 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '3',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '2',
                        ),
                    6 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '2',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '3',
                        ),
                    7 =>
                        array (
                            'cinema_id' => '1',
                            'movie_id' => '1',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '4',
                        ),
                    8 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '1',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '1',
                        ),
                    9 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '2',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '2',
                        ),
                    10 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '3',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '3',
                        ),
                    11 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '4',
                            'room_id' => '1',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '4',
                        ),
                    12 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '4',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '1',
                        ),
                    13 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '3',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '2',
                        ),
                    14 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '2',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '3',
                        ),
                    15 =>
                        array (
                            'cinema_id' => '2',
                            'movie_id' => '1',
                            'room_id' => '2',
                            'seats' => '30',
                            'date' => '1/8/2022',
                            'slot_id' => '4',
                        ),
                ),
        );


        for ($x = 1; $x <= 31; $x++) {
            $date = '';
            if($x < 10) {
                $date = '2022-08-0'.$x;
            } else {
                $date =   $date = '2022-08-'.$x;
            }
            foreach ($data['RECORDS'] as $record) {
                $screening = new Screening();
                $screening->cinema_id = $record['cinema_id'];
                $screening->movie_id = $record['movie_id'];
                $screening->room_id = $record['room_id'];
                $screening->seats = $record['seats'];
                $screening->date = $date;
                $screening->slot_id = $record['slot_id'];
                $screening->save();
            }
        }

    }
}
