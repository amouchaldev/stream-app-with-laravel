<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $quality = ['HD', 'SD', 'WebRip', 'FHD', '4K'];
        return [
            // "tmdb_id" => $this->num++,
            // "name" => rand(550, 680),
            "quality" => $quality[rand(0, count($quality) - 1)], 
            "trailler" => "https://www.youtube.com/embed/mqqft2x_Aa4"
        ];
    }
}
