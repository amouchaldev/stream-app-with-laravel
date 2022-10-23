<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SeasonAndEp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $className;
    public function __construct($className)
    {
        $this->className = $className;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.season-and-ep');
    }
}
