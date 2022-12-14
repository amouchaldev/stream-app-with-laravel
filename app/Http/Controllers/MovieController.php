<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', "isAdmin"])->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('main.result', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control-panel.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tmdb_id' => 'required|unique:movies',
            'name' => 'required',
            'quality' => 'required',
            'trailler' => 'required',
        ]);
        $movie = new Movie();
        $movie->tmdb_id = $request['tmdb_id'];
        $movie->name = $request['name'];
        $movie->quality = $request['quality'];
        $movie->trailler = $request['trailler'];
        $movie->save();
        return back()->with('status', $request['name'] . ' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        if(Auth::check()) {
            $inFavorite = Favorite::where('movie_id', $id)->where('user_id', Auth::user()->id)->first();
        }
        return view('main.about', [
            'movie' => $movie,
            'isFav' => $inFavorite ?? null
        ]);

    }

    public function player($id) {
        $movie = Movie::whereId($id)->with(['streams', 'downloads'])->first();
        // return $movie->streams[0]->link;
        return view('main.player', [
            "movie" => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
