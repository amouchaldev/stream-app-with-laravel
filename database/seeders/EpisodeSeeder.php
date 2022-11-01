<?php

namespace Database\Seeders;

use App\Models\Episode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $epNum;
    public function __construct()
    {
        $this->epNum = 1;
    }
    public function run()
    {
        $nbEpisodes = $this->command->ask('how many episode you want add ?');
        $user_id = $this->command->ask('enter user id which add this episodes');
        $season = $this->command->ask('enter season id that this episodes belongs to');
        $quality = $this->command->ask('episode quality: ');
        Episode::factory($nbEpisodes)->make()->each(function ($episode) use($user_id, $season, $quality) {
            $episode->episode_num = $this->epNum++;
            $episode->season_id = $season;
            $episode->user_id = $user_id;
            $episode->quality = $quality;
            $episode->save();
        });
    }
}
