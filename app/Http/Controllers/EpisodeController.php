<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function show($id) {
        return view('main.about');

            return Episode::findOrFail($id);
    }    
}
