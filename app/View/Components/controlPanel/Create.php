<?php

namespace App\View\Components\controlPanel;

use Illuminate\View\Component;

class Create extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $route;
    public $method;
    public $title;
    public function __construct($route, $method, $title)
    {
        $this->route = $route;
        $this->method = $method;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.controlPanel.create');
    }
}
