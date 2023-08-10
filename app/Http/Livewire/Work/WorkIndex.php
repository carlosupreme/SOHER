<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Livewire\Component;
use Livewire\WithPagination;

class WorkIndex extends Component
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
        if (\Auth::user()->hasAnyRole("admin")) {
            $works = Work::matching($this->search, 'title', 'description', 'skills')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('livewire.work.work-index', compact('works'));
        }

        if (\Auth::user()->hasAnyRole("client")) {
            if ($this->status) {
                $works = Work::matching($this->search, 'title', 'description', 'skills')
                    ->where('client_id', \Auth::id())
                    ->where('status', $this->status)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            } else {
                $works = Work::matching($this->search, 'title', 'description', 'skills')
                    ->where('client_id', \Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            }
            return view('livewire.work.work-index', compact('works'));
        }

        abort(404);
    }
}
