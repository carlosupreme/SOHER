<?php

namespace App\Http\Livewire\Work;

use App\Models\AssignWork;
use App\Models\User;
use App\Models\Work;
use App\Work\Domain\Status;
use Livewire\Component;

class Assign extends Component
{
    public $open;
    public $workId;
    protected $listeners = ['modalAssignOpen'];
    public $workers;
    public $selected = -1;

    public function mount($workId)
    {
        $this->workId = $workId;
        $this->open = false;
        $this->workers = User::role('worker')
            ->get(['name', 'id', 'profile_photo_path'])
            ->filter((fn($u) => $u->available())); // make the filter in query for perfomance
    }

    public function assign()
    {
        $work = Work::findOrFail($this->workId);
        $work->status = Status::PROGRESS->value;
        $work->save();

        $assigned = new AssignWork();
        $assigned->work_id = $this->workId;
        $assigned->user_id = $this->selected;
        $assigned->save();

        return redirect()->route('work.show', $this->workId)->with('flash.banner', 'Solicitud asignada correctamente');
    }

    public function modalAssignOpen()
    {

        $this->open = true;
    }

    public function render()
    {
        return view('livewire.work.assign');
    }
}
