<?php

namespace App\Http\Livewire\Work;

use App\Work\Domain\Status;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class WorkEdit extends Component
{

    use WithFileUploads;

    public $work;

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
    public $newPhoto;

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

    public function mount($work): void
    {
        $this->newPhoto = null;
        $this->work = $work;
        $today = $work->deadline;
        $this->daysInMonth = $today->daysInMonth;
        $this->deadline = [
            'day' => $today->day,
            'month' => $today->month,
            'year' => $today->year
        ];
        $this->client_id = $work->client_id;
        $this->title = $work->title;
        $this->location = $work->location;
        $this->description = $work->description;
        $this->skills = json_decode($work->skills);
        $this->initialBudget = $work->initial_budget;
        $this->finalBudget = $work->final_budget;
        $this->photo = $work->photo;
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
            'finalBudget' => 'required|numeric|gte:initialBudget|max_digits:6'
        ]);


        $this->work->title = $this->title;
        $this->work->description = $this->description;
        $this->work->location = $this->location;
        try {
            $this->work->skills = json_encode($this->skills, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            return redirect()->route('work.edit', $this->work)->with(['flash.bannerStyle' => 'danger', 'flash.banner' => 'Selecciona al menos una categoria']);
        }
        $this->work->initial_budget = $this->initialBudget;
        $this->work->final_budget = $this->finalBudget;
        $this->work->deadline = Carbon::create($this->deadline['year'], $this->deadline['month'], $this->deadline['day']);
        $this->work->photo = $this->newPhoto ? Storage::url($this->newPhoto->store('/public/images')) : $this->photo;
        $this->work->status = Status::OPEN->value;
        $this->work->save();

        return redirect()->route('work.show', $this->work)->with(['flash.bannerStyle' => 'success', 'flash.banner' => 'Solicitud editada exitosamente']);
    }

    public function render()
    {
        return view('livewire.work.work-edit');
    }

    public function updatedNewPhoto()
    {
        $this->validateOnly('newPhoto', ['newPhoto' => 'image']);
    }
}
