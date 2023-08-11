<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class WorkMyworks extends Component
{
    use WithPagination;

    public $search;
    public $status;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'status' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $works = Work::whereClientId(Auth::id())
            ->matchingStrict($this->search, 'title')
            ->matchingStrict($this->status, 'status')
            ->get();

        return view('livewire.work.work-myworks', compact('works'));
    }
}
