<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     */
     public $image;
     public $text;
     public $listing;
    public function __construct($image="", $text="", $listing="")
    {
        //
        $this->image = $image;
        $this->text = $text;
        $this->listing = $listing;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item');
    }
}
