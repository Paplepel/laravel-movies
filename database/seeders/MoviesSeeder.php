<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moive = new Movie();
        $moive->name = 'Avengers: Endgame';
        $moive->movie_poster = '0000.jpg';
        $moive->movie_banner = '0000.jpg';
        $moive->save();

        $moive = new Movie();
        $moive->name = 'Batman';
        $moive->movie_poster = '0000.jpg';
        $moive->movie_banner = '0000.jpg';
        $moive->save();

        $moive = new Movie();
        $moive->name = 'Thinker Bell';
        $moive->movie_poster = '0000.jpg';
        $moive->movie_banner = '0000.jpg';
        $moive->save();

        $moive = new Movie();
        $moive->name = 'Finding Nemo';
        $moive->movie_poster = '0000.jpg';
        $moive->movie_banner = '0000.jpg';
        $moive->save();

    }
}
