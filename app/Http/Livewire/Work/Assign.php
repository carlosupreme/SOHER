<?php

namespace App\Http\Livewire\Work;

use App\Mail\WorkBlockedByAdmin;
use App\Models\AssignWork;
use App\Models\User;
use App\Models\Work;
use App\Work\Domain\Status;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Assign extends Component
{
    public $open;
    public $workId;
    public $workers;
    public $selected = -1;
    public $work;
    public $fechaSolicitada;
    protected $listeners = ['blockWork'];

    public function mount($work)
    {
        $this->workId = $work->id;
        $this->work = $work;
        $this->open = false;
        $this->workers = User::role('worker')
            ->get(['name', 'id', 'profile_photo_path']) //->filter((fn($u) => $u->available())) // make the filter in query for perfomance
        ;
        $this->fechaSolicitada = sprintf(
            "%s %d de %s del %d",
            $work->deadline->getTranslatedDayName(),
            $work->deadline->day,
            $work->deadline->getTranslatedMonthName(),
            $work->deadline->year
        );
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

        return redirect()->route('work.details', $this->workId)->with('flash.banner', 'Solicitud asignada correctamente');
    }

    public function blockWork()
    {
        $this->work->status = Status::BLOCKED->value;
        $this->work->save();
        $this->emit('actionCompleted');
        Mail::to($this->work->client->email)->send(new WorkBlockedByAdmin($this->work));
        return redirect()->route('work.details', ['work' => $this->work]);
    }

    public function render()
    {
        return view('livewire.work.assign');
    }
}
