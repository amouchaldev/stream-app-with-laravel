<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Exception;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function show($id) {
        return view('main.about');
            return Episode::findOrFail($id);
    }    

    public function getEpisodesBySeason($serieId, $seasonId) {
        try {
            $episodes = Season::whereId($seasonId)
                        ->whereHas('serie', function ($q) use($serieId) { $q->where('id', $serieId); })
                        ->first()->episodes;
                        return response()->json(["success" => true, "episodes" => $episodes], 200);
                    }
        catch (Exception $e) {
            return response()->json([
                'success' => "false", "errors" => $e->getMessage()
            ], 404);
        }
    }

    public function player($id) {
        $serie = Episode::find($id)->season()->first()->serie;
        $episode = Episode::whereId($id)->with(['streams', 'downloads'])->first();
        return view('main.player', [
            'serie' => $serie,
            'episode' => $episode
        ]);

    }


}
