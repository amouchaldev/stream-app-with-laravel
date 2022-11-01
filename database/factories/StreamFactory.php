<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stream>
 */
class StreamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $serverName = ['Mega', 'Google Drive', 'Uptobox', 'GoVad', 'linkbox', 'SkyVid', 'DoodStream', 'VidShare'];
        $servers = ["https://vidshar.org/embed-s7lsu8gtc46p.html", "https://govad.xyz/embed-4zogi3jxtjoj.html", "https://www.linkbox.to/player.html?id=fp3fk0000vxc"];
        $quality = ['HD', 'SD', 'WebRip', 'FHD', '4K'];
        return [
            "name" => $serverName[rand(0, count($serverName) - 1)],
            "link" => $servers[rand(0, count($servers) - 1)],
            "quality" => $quality[rand(0, count($quality) - 1)], 
        ];
    }
}
