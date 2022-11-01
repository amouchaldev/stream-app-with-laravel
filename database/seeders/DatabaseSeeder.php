<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $nbUsers = $this->command->ask('how users you want to add ?');
        \App\Models\User::factory($nbUsers)->create();

        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([MovieSeeder::class, SerieSeeder::class,
         SeasonSeeder::class,EpisodeSeeder::class,
        StreamSeeder::class, DownloadSeeder::class,
    Genre::class]);
    }
}
