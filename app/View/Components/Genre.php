<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Genre extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $link;
    public $className;
    public function __construct($link, $className = "bg-light")
    {
        $this->link = $link;
        $this->className = $className;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.genre');
    }
}
