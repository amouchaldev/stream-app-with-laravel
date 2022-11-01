<?php

namespace Database\Seeders;

use App\Models\Serie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
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
        $nbSeries = $this->command->ask('how series you want to add ?');
        $users = User::all();
        Serie::factory($nbSeries)->make()->each(function ($movie) use ($users) {
            $movie->tmdb_id = $this->tmdb_id += 3;
            $movie->user_id = $users->random()->id;
            $movie->save();
        });
    }
}
