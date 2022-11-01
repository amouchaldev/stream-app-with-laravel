<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Download>
 */
class DownloadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $serverName = ['Mega', 'Google Drive', 'Uptobox', 'GoVad', 'linkbox', 'SkyVid', 'DoodStream', 'VidShare'];
        $servers = ["https://www.sharezweb.com/file/fp3fks0000ai", "https://upbam.org/8xjj3xqq4rr0/CimaClub.Cam-the.takeover.2022.720p.x264.aac.mkv.html", "https://1fichier.com/?uqrnhla7235y3amib711", "https://1fichier.com/?uqrnhla7235y3amib711"];
        $quality = ['HD', 'SD', 'WebRip', 'FHD', '4K', '720p', '480p', '1080p', '360p'];
        return [
            "name" => $serverName[rand(0, count($serverName) - 1)],
            "link" => $servers[rand(0, count($servers) - 1)],
            "quality" => $quality[rand(0, count($quality) - 1)], 
        ];
    }
}
