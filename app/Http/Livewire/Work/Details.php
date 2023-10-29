<?php

namespace App\Http\Livewire\Work;

use Livewire\Component;

class Details extends Component
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
    public function render()
    {
        $assigned = null;

        if ($a = $this->work->assigned) {
            $assigned = $a->user;
        }

        return view('livewire.work.details', compact('assigned'));
    }
}
