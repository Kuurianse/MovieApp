<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Card extends Component
{
    // php artisan make:component Movie/Card

    public $index;
    public $image;
    public $title;
    public $releasedate;

    public function __construct($index, $image, $title, $releasedate)
    {
        $this->index = $index;
        // $this->image = $this->getImage($image);
        $this->image = $image;
        $this->title = $title;
        $this->releasedate = $releasedate;

        if($this->isValid()){
            $this->title = Str::upper($title);
            // $this->releasedate = Carbon::parse($releasedate)->translatedFormat('l, d F Y');
            $this->releasedate = Carbon::parse($releasedate)->format('M d, Y');
        }
    }

    /**
     * Check if the data is valid
     *
     * @return bool
     */
    private function isValid(): bool
    {
        // Validasi data disini
        return $this->title && $this->releasedate;
    }

    // validasi image, kalo image kosong, diganti
    // public function getImage($image): string
    // {
    //     if($image) {
    //         return $image;
    //     }
    //     return 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/qgcUcDZrDjCcAiIjtiKqVAwokhJ.jpg';
    // }

    // bisa juga di akses di view, ganti $image dengan $getImage
    public function getImage(): string
    {
        if($this->image) {
            return $this->image;
        }
        // return 'https://via.placeholder.com/300x450'; error
        return 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/qgcUcDZrDjCcAiIjtiKqVAwokhJ.jpg';

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // logic bisa ditempatkan disini atau di constructor
        // $this->title  = Str::upper($this->title);

        if(!$this->isValid()){
            return '';
        }

        return view('components.movie.card');
    }
}
