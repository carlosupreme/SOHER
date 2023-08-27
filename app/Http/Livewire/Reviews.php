<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class Reviews extends Component
{
    public $userId;

    public function mount($user)
    {
        $this->userId = $user;
    }

    public function render()
    {
        $reviews = Review::with(['from_user' => fn($query) => $query->select('id', 'name')])
            ->where('to_user_id', $this->userId)
            ->get();
        return view('livewire.reviews', compact('reviews'));
    }
}
