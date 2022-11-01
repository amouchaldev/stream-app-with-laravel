<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $i;
    public function __construct()
    {
        $this->i = 0;
    }
    public function run()
    {
        $genres = ['action', 'horror', 'drama', 'fantasy', 'news', 'crime', 'music', 'romance', 'talk', 'soap', 'kids', 'comedy', 'animation', 'family', 'war', 'western', 'biography', 'adventure', 'documentary', 'history', 'reality', 'science fiction'];
        // $i = 0;
        Genre::factory(count($genres))->make()->each(function ($genre) use($genres) {
            $genre->name = $genres[$this->i];
            $this->i++;
            $genre->save();
        });
    
    }
}
