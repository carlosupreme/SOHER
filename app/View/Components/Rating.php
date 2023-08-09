<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rating extends Component
{
    public $client;
    public $rate;
    public $stars;
    public $reviews;

    public function __construct($client)
    {
        $this->client = $client;
        $this->rate = $client->rating();
        $this->stars = round($this->rate);
        $this->reviews = $client->reviews->count();
    }

    public function render(): View|Closure|string
    {
        return view('components.rating');
    }
}
