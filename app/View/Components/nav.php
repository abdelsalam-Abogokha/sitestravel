<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class nav extends Component
{
    /**
     * Create a new component instance.
     */

     public $active1="";
     public $active2="";
     public $active3="";
     public $active4="";
     public $active5="";
     public $active6;
     
    public function __construct($active1="", $active2="", $active3="", $active4="", $active5="", $active6="")
    {
        //
        $this->active1 = $active1;
        $this->active2 = $active2;
        $this->active3 = $active3;
        $this->active4 = $active4;
        $this->active5 = $active5;
        $this->active6 = $active6;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav');
    }
}
