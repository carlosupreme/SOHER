<?php

namespace App\Http\Livewire\Work;

use App\Models\AssignWork;
use App\Work\Domain\Status;
use Livewire\Component;

class WorkAssigned extends Component
{
    public $workId;
    public $work;
    public $fechaSolicitada;
    public $clientRate = 0;

    public function mount($work)
    {
        $this->workId = $work->id;
        $this->work = $work;
        $this->fechaSolicitada = sprintf(
            "%s %d de %s del %d",
            $work->deadline->getTranslatedDayName(),
            $work->deadline->day,
            $work->deadline->getTranslatedMonthName(),
            $work->deadline->year
        );
    }

    public function complete()
    {
        //pedir firma
        $this->work->status = Status::FINISHED->value;
        $aw = AssignWork::where('work_id', $this->workId);
        $aw->status = Status::FINISHED->value;
        $this->work->save();
        return redirect()->route('work.assigned-index')->with('flash.banner', 'Solicitud completada');
    }

    public function render()
    {
        return view('livewire.work.work-assigned');
    }
}
