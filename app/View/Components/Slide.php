<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Slide extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sectionId;
    public $sectionTitle;
    public $slideClassName;
    public $slideData;
    public function __construct($slideId, $sectionTitle, $slideClassName, $slideData)
    {
        $this->sectionId = $slideId;
        $this->sectionTitle = $sectionTitle;
        $this->slideClassName = $slideClassName;
        $this->slideData = $slideData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slide');
    }
}
