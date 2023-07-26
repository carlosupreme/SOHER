<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Livewire\Component;
use Livewire\WithPagination;

class WorkIndex extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],

    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $works = Work::matching($this->search, 'title', 'description', 'skills')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.work.work-index', compact('works'));
    }
}
