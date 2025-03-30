<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopTour extends Component
{
    /**
     * Create a new component instance.
     */

     public $image;
     public $text;
     public $Rating;
     public $price;
     public $pragraphe;
     public $days;
     public $text2;
     public $text3;
     public $star1;
     public $star2;
     public $star3;
     public $star4;
     public $star5;

    public function __construct($image = "", $text = "", $Rating = "", $price = "", $pragraphe = "", $days = "", $text2 = "", $text3 = "",
    $star1 = "", $star2 = "", $star3 = "", $star4 = "", $star5 = "")
    {
        //
        $this->image = $image;
        $this->text = $text;
        $this->Rating = $Rating;
        $this->price = $price;
        $this->pragraphe = $pragraphe;
        $this->days = $days;
        $this->text2 = $text2;
        $this->text3 = $text3;
        $this->star1 = $star1;
        $this->star2 = $star2;
        $this->star3 = $star3;
        $this->star4 = $star4;
        $this->star5 = $star5;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Top-Tour');
    }
}