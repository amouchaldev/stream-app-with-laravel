<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Poster extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $type;
    public $season;
    public $episode;
    public $quality;
    public $poster;
    public $year;
    public $duration;
    public function __construct($title, $quality, $poster, $season = null, $episode = null, $type = "movie", $year = null, $duration = null)
    {
        $this->title = $title;
        $this->type = $type;
        $this->season = $season;
        $this->episode = $episode;
        $this->quality = $quality;
        $this->poster = $poster;
        $this->year = $year;
        $this->duration = $duration;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.poster');
    }
}
