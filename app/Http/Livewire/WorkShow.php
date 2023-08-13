<?php

namespace App\Http\Livewire;

use App\Work\Domain\Status;
use Carbon\Carbon;
use Livewire\Component;

class WorkShow extends Component
{
    public $work;
    public $clientRate;
    public $fechaSolicitada;

    public function mount($work)
    {
        $this->clientRate = 4.9;
        $this->work = $work;
        $deadline = Carbon::createFromTimeString($work->deadline . '00:00:00');
        $this->fechaSolicitada = ucfirst($deadline->getTranslatedDayName()). ' ' . $deadline->day . ' de ' . ucfirst($deadline->getTranslatedMonthName()) . ' del ' . $deadline->year;
    }

    public function archive(){
        $this->work->status = Status::ARCHIVED->value;
        $this->work->save();
        return redirect()->route('work.show', $this->work->id)->with(['flash.bannerStyle' => 'success', 'flash.banner' => 'Solicitud archivada exitosamente']);
    }

    public function openWork(){
        $this->work->status = Status::OPEN->value;
        $this->work->save();
        return redirect()->route('work.show', $this->work->id)->with(['flash.bannerStyle' => 'success', 'flash.banner' => 'Solicitud abierta exitosamente']);
    }

    public function render()
    {
        return view('livewire.work-show');
    }
}
