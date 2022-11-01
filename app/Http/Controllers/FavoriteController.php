<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index() {
        $movies = User::whereId(1)->with(['favorites' => function ($q) { $q->where("movie_id", "null"); }])->get();

        return view('main.result', []);
    }
}
