<?php

namespace App\Http\Livewire\Work;

use Auth;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class WorkCreate extends Component
{
    use WithFileUploads;

    public $client_id;
    public $title;
    public $location;
    public $description;
    public $daysInMonth;
    public $skills;
    public $deadline;
    public $initialBudget;
    public $finalBudget;
    public $photo;

    protected $rules = [
        'title' => 'required|min:10|max:70',
        'description' => 'required|min:10|max:2000',
        'initialBudget' => 'required|numeric|min:1',
        'finalBudget' => 'required|numeric|min:1',
        'photo' => 'image|max:204800'
    ];

    public function mount()
    {
        $today = Carbon::now();
        $this->daysInMonth = $today->daysInMonth;
        $this->deadline = [
            'day' => $today->day,
            'month' => $today->month,
            'year' => $today->year
        ];
        $this->client_id = Auth::id();
    }

    public function submitForm()
    {
        $this->validate();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.work.work-create');
    }
}
