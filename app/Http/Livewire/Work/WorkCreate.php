<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use App\Work\Domain\Status;
use Auth;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

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
        'location' => 'required|min:10|max:100',
        'skills' => 'required',
        'deadline.*' => 'required',
        'description' => 'required|min:10|max:2000',
        'initialBudget' => 'required|numeric|min:1|max_digits:6',
        'finalBudget' => 'required|numeric|gte:initialBudget|max_digits:6',
        'photo' => 'image'
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
        $this->validate([
            'title' => 'required|min:10|max:70',
            'location' => 'required|min:10|max:100',
            'skills' => 'required',
            'deadline.*' => 'required',
            'description' => 'required|min:10|max:2000',
            'initialBudget' => 'required|numeric|min:1|max_digits:6',
            'finalBudget' => 'required|numeric|gte:initialBudget|max_digits:6',
        ]);

        $work = new Work();
        $work->title = $this->title;
        $work->description = $this->description;
        $work->location = $this->location;
        try {
            $work->skills = json_encode($this->skills, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            return redirect()->route('work.create')->with(['flash.bannerStyle' => 'danger', 'flash.banner' => 'Selecciona al menos una categoria']);
        }

        $work->initial_budget = $this->initialBudget;
        $work->final_budget = $this->finalBudget;
        $work->deadline = Carbon::create($this->deadline['year'], $this->deadline['month'], $this->deadline['day']);
        $work->client_id = $this->client_id;
        $work->photo = $this->photo ? Storage::url($this->photo->store('/public/images')) : null;
        $work->status = Status::OPEN->value;

        $work->save();

        return redirect()->route('dashboard')->with(['flash.bannerStyle' => 'success', 'flash.banner' => 'Trabajo solicitado exitosamente']);
    }

    public function render()
    {
        return view('livewire.work.work-create');
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo', ['photo' => 'image']);
    }
}
