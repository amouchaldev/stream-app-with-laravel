<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        if (Auth::check()) {
            $favWithMovie = Favorite::where('movie_id', '<>', Null)->where('user_id', Auth::user()->id)->with("serie")->get();
            $favWithSerie = Favorite::where('serie_id', '<>', Null)->where('user_id', Auth::user()->id)->with("serie")->get();
            $movies = [];
            foreach($favWithMovie as $fav) {
                $movies[] = $fav->movie;
            }
            $series = [];
            foreach($favWithSerie as $fav) {
                $series[] = $fav->serie;
            }
            return view('main.result', [
                "movies" => json_encode($movies),
                "series" => json_encode($series)
            ]);
        }
    }

    public function store(Request $request, $id) {
        if(Auth::check()) {
            if ($request['route'] == "movies") {
                $fav = New Favorite();
                $fav->user_id = Auth::user()->id;
                $fav->movie_id = $id;
                $fav->save();
                return "true";
            }
    
            if ($request['route'] == "series") {
                $fav = New Favorite();
                $fav->user_id = Auth::user()->id;
                $fav->serie_id = $id;
                $fav->save();
                return "true";
            }
        }
    }

    public function delete(Request $request, $id) {
        if(Auth::check()) {
            if ($request['route'] == "movies") {
                Favorite::where('movie_id', $id)->where('user_id', Auth::user()->id)->delete();
                return "success";
            }
    
            if ($request['route'] == "series") {
                Favorite::where('serie_id', $id)->where('user_id', Auth::user()->id)->delete();
                return "success";
            }
            
        }
    }

}
