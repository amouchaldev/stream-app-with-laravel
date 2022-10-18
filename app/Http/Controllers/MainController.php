<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function fetchMovieOrSerie($type, $array, $new_array) {
        define("API_URL", "https://api.themoviedb.org/3/");
        define("API_KEY", "4e1ba29d0bd265e3f3eb30d63b771b12");
        if($type == "movie") {
            //  print_r($new_array);
            // echo "hpp";
            foreach($array as $item)  { 
                // echo "https://image.tmdb.org/t/p/w500" . Http::get(API_URL . $type . "/" . $item->tmdb_id . "?api_key=" . API_KEY)['poster_path'] . "\n";
                $new_array[] = [
                    'name' => Http::get(API_URL . $type . "/" . $item->tmdb_id . "?api_key=" . API_KEY)["title"],
                    'release_date' => Http::get(API_URL . $type. "/" . $item->tmdb_id . "?api_key=" . API_KEY)['release_date'],
                    'poster' => "https://image.tmdb.org/t/p/w500/kqjL17yufvn9OVLyXYpvtyrFfak.jpg" . Http::get(API_URL . $type . "/" . $item->tmdb_id . "?api_key=" . API_KEY)['poster_path'],
                    'quality' => $item->quality
            ];  
            // $new_array[] = [
                //     'name' => "NAME TEST",
                //     'release_date' => 'RELEASE DATE TEST',
                //     'poster' => "POSTER TEST",
                //     'quality' => "QUALITY TEST"
                //     ];  
            }
            
            // print_r($new_array);
        }
        
    }


    public function index() {
        //     $response = Http::get("https://api.themoviedb.org/3/movie/" . 550 . "?api_key=4e1ba29d0bd265e3f3eb30d63b771b12")["title"];
        // return $response;
      $trendingMovies = ["one" => "lool"];
      $movies = Movie::inRandomOrder()->limit(12)->get(['tmdb_id', 'quality']);
      $this->fetchMovieOrSerie("movie", $movies, $trendingMovies);
        print_r($trendingMovies);
    } 


    public function fetchTrending() {
    //     $trendingMovies = Movie::take(12)->get('tmdb_id');
    //     $trendingSeries = Serie::take(12)->get('tmdb_id');
    //     return response()->json([
    //         'trendingMovies' => $trendingMovies,
    //         'trendingSeries' => $trendingSeries 
    //     ]);
    }
}
