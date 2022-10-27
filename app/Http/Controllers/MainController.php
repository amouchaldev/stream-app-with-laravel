<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use App\Models\Serie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    // public function fetchMovieOrSerie($type, $array, &$new_array) {
    //     define("API_URL", "https://api.themoviedb.org/3/");
    //     define("API_KEY", "4e1ba29d0bd265e3f3eb30d63b771b12");
    //     if($type == "movie") {
    //         foreach($array as $item)  { 
    //             $new_array[] = [
    //                 'name' => Http::get(API_URL . $type . "/" . $item->tmdb_id . "?api_key=" . API_KEY)["title"],
    //                 'release_date' => date('Y', strtotime(Http::get(API_URL . $type. "/" . $item->tmdb_id . "?api_key=" . API_KEY)['release_date'])),
    //                 'poster' => "https://image.tmdb.org/t/p/w500" . Http::get(API_URL . $type . "/" . $item->tmdb_id . "?api_key=" . API_KEY)['poster_path'],
    //                 'runtime' => Http::get(API_URL . $type. "/" . $item->tmdb_id . "?api_key=" . API_KEY)['runtime'],
    //                 'quality' => $item->quality
    //         ];  
    //         }
    //     }   
    // }


    public function index() {
    //   $randomMovies = [];
    //   $randomMovies = Movie::inRandomOrder()->limit(12)->get(['tmdb_id', 'quality']);
    //   $this->fetchMovieOrSerie("movie", $movies, $randomMovies);
    //   return response()->json($randomMovies);
    //   return json_encode($randomMovies, true);
        // $randomEp = Episode::inRandomOrder()->limit(12)->get();
        $randomMovies = Movie::inRandomOrder()->limit(12)->get(['id', 'tmdb_id', 'quality']);
        $randomSeries = Serie::inRandomOrder()->limit(12)->get(['id', 'tmdb_id', 'quality']);
        $latestMovies = Movie::limit(20)->orderBy('created_at', 'DESC')->get(['id', 'tmdb_id', 'quality']);
        $latestEp = Episode::limit(20)->orderBy('created_at', 'DESC')->get();
        return view('main.index', [
            'randomMovies' => $randomMovies,
            'randomSeries' => $randomSeries,
            'latestMovies' => $latestMovies,
            'latestEp' => $latestEp,
        ]);
    } 
    
    
    // public function random($type) {
    //     if ($type == "movies") {
    //         $randomMovies = Movie::inRandomOrder()->limit(12)->get(['id', 'tmdb_id', 'quality']);
    //         return response()->json($randomMovies);
    //     }
    //     if ($type = "series") {
    //         $randomSeries = Serie::inRandomOrder()->limit(12)->get(['id', 'tmdb_id', 'quality']);
    //         return response()->json($randomSeries);
    //     }
    // }
    // public function randomSerie() {
    //     $randomSeries = Serie::inRandomOrder()->limit(12)->get(['id', 'tmdb_id', 'quality']);
    //     return response()->json($randomSeries);
    // }     
    
    // public function latest($type) {
    //     $latestMovies = Movie::limit(20)->orderBy('created_at', 'DESC')->get(['id', 'tmdb_id', 'quality']);
    //     return response()->json($latestMovies);
    // }

    public function fetch($key = null) {
        if ($key) {
            $movies = Movie::where('name', 'like', "$key%")->get();
            $series = Serie::where('name', 'like', "$key%")->get();
            return response()->json([
                'success' => true,
                'movies' => $movies,
                'series' => $series
            ]);
        }
        else {
            return response()->json(['success' => false]);
        }
    }


    public function search($key = null) {
        if ($key) {  
            $movies = Movie::where('name', 'like', "$key%")->get();
            $series = Serie::where('name', 'like', "$key%")->get();
            return view('main.result', [
                'movies' => $movies,
                'series' => $series
            ]);
        }
        else {
            return view('main.result');
        }
    }


}
