<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $tmdb_id;
    public function __construct()
    {
        $this->tmdb_id = 550;
    }
    public function run()
    {   
        $nbMovies = $this->command->ask('how movies you want to add ?');
        $users = User::all();
        Movie::factory($nbMovies)->make()->each(function ($movie) use ($users) {
            $movie->tmdb_id = $this->tmdb_id += 3;
            $movie->user_id = $users->random()->id;
            $movie->save();
        });

    }
}
