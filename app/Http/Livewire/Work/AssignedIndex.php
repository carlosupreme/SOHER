<?php

namespace App\Http\Livewire\Work;

use Auth;
use Livewire\Component;

class AssignedIndex extends Component
{
    public $works;

    public function mount()
    {
        $this->works = Auth::user()->assigns()->with('work')->get();
    }

    public function render()
    {
        return view('livewire.work.assigned-index');
    }
}
