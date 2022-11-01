<?php

namespace Database\Seeders;

use App\Models\Download;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = $this->command->ask('What You Want To Add Movie Or Tv Show');
        $nbServers = $this->command->ask('How Many Download Server You Want To Add ?');
        $user_id = $this->command->ask('Enter User Id That Create This: ');
        
        if ($type == "movie") {
            $movie_id = $this->command->ask('Enter Movie Id That This Servers Links Belongs To: ');
            Download::factory($nbServers)->make()->each(function ($stream) use($user_id, $movie_id) {
                $stream->movie_id = $movie_id;
                $stream->user_id = $user_id;
                $stream->save();
            });
        }

        if ($type == "tv show") {
            $ep_id = $this->command->ask('Enter Episode Id That This Servers Links Belongs To: ');
            Download::factory($nbServers)->make()->each(function ($stream) use($user_id, $ep_id) {
                $stream->episode_id = $ep_id;
                $stream->user_id = $user_id;
                $stream->save();
            });
        }
    }
}
