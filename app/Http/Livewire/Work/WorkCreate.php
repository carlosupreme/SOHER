<?php

namespace App\Http\Livewire\Work;

use Livewire\Component;

class WorkCreate extends Component
{
    public $client_id;
    public $title;
    public $location;
    public $description;
    public $skills;

    protected $rules = [
        'title' => 'required|min:10|max:70',
        'description' => 'required|min:10|max:2000'
    ];

    public function mount()
    {
        $this->client_id = \Auth::id();
    }

    public function render()
    {
        return view('livewire.work.work-create');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

}
