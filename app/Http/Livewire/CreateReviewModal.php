<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateReviewModal extends Component
{
    protected $listeners = ['open-create-review-modal' => 'open'];

    public $open;
    public $user;
    public $title;
    public $rating = 0;
    public $review;

    public $rating_scale = [
        1 => 'Muy mala',
        2 => 'Mala',
        3 => 'Regular',
        4 => 'Buena',
        5 => 'Muy buena',
        0 => ''
    ];

    public function open($userId)
    {
        $this->user = User::findOrFail($userId);
        $this->open = true;
    }

    public function store()
    {
        $this->validate([
            'title' => 'max:70',
            'review' => 'max:400',
            'rating' => 'required|numeric|min:1'
        ], [
            'rating' => 'Selecciona un emoji'
        ]);

        $review = new Review();
        $review->from_user_id = Auth::id();
        $review->to_user_id = $this->user->id;
        $review->title = $this->title;
        $review->review = $this->review;
        $review->rating = $this->rating;
        $review->save();
        $this->emit('refreshList');
        $this->reset('open', 'title', 'review', 'rating');
    }

    public function updatingOpen($value)
    {
        if (!$value)
            $this->reset('open', 'title', 'review', 'rating');
    }

    public function render()
    {
        return view('livewire.create-review-modal');
    }
}
