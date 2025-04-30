<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */

    public $index;
    public $image;
    public $title;
    public $releasedate;

    public function __construct($index, $image, $title, $releasedate)
    {
        $this->index = $index;
        $this->image = $image;
        $this->title = $title;
        $this->releasedate = $releasedate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.movie.card');
    }
}
