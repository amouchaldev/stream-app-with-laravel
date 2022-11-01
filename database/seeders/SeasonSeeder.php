<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serie_id = $this->command->ask('enter serie id that season belongs to');
        $user_id = $this->command->ask('enter user id which add this episodes');
        $season_num = $this->command->ask('enter season number');
        $poster = $this->command->ask('enter season poster link');
        Season::factory(1)->make()->each(function ($episode) use($serie_id, $user_id, $season_num, $poster) {
            $episode->serie_id = $serie_id;
            $episode->user_id = $user_id;
            $episode->season_num = $season_num;
            $episode->poster = $poster;
            $episode->save();
        });
    }
}
