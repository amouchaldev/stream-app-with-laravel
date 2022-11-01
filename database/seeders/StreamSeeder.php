<?php

namespace Database\Seeders;

use App\Models\Stream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = $this->command->ask('What You Want To Add Movie Or Tv Show');
        $nbServers = $this->command->ask('How Many Stream Server You Want To Add ?');
        $user_id = $this->command->ask('Enter User Id That Create This: ');
        
        if ($type == "movie") {
            $movie_id = $this->command->ask('Enter Movie Id That This Servers Links Belongs To: ');
            Stream::factory($nbServers)->make()->each(function ($stream) use($user_id, $movie_id) {
                $stream->movie_id = $movie_id;
                $stream->user_id = $user_id;
                $stream->save();
            });
        }

        if ($type == "tv show") {
            $serie_id = $this->command->ask('Enter Episode Id That This Servers Links Belongs To: ');
            Stream::factory($nbServers)->make()->each(function ($stream) use($user_id, $serie_id) {
                $stream->episode_id = $serie_id;
                $stream->user_id = $user_id;
                $stream->save();
            });
        }

    }
}
