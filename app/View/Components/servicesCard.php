<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class servicesCard extends Component
{
    /**
     * Create a new component instance.
     */

     public $icon;
     public $heading;
     public $paragraph;

    public function __construct($icon="" , $heading="" , $paragraph="")
    {
        //
        $this->icon = $icon;
        $this->heading = $heading;
        $this->paragraph = $paragraph;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services-card');
    }
}
