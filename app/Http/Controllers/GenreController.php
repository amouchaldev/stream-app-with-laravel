<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show($genre) {
        $movies = Movie::whereHas('genres', function ($q) use($genre) { $q->where('name' , $genre); })
        ->get();
        $series = Serie::whereHas('genres', function ($q) use($genre) { $q->where('name' , $genre); })
        ->get();
        // return $movies;
        return view('main.result', [
            'genre' => $genre,
            'movies' => $movies,
            'series' => $series
        ]);
    }
}
