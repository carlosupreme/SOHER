<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class Reviews extends Component
{
    public $userId;
    protected $listeners = ['refreshList' => '$refresh'];

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function create()
    {
        $this->emit('open-create-review-modal', $this->userId);
    }

    public function render()
    {
        $reviews = Review::with(['from_user' => fn ($query) => $query->select('id', 'name')])
            ->where('to_user_id', $this->userId)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.reviews', compact('reviews'));
    }
}
