<?php

namespace App\Http\Livewire;

use App\Mail\WorkBlockedByAdmin;
use App\Work\Domain\Status;
use Auth;
use Livewire\Component;
use Mail;

class WorkShow extends Component
{
    public $work;
    public $clientRate;
    public $fechaSolicitada;

    protected $listeners = ['blockWork'];

    public $user;


    public function mount($work)
    {
        $this->user = Auth::user();
        $this->clientRate = 4.9;
        $this->work = $work;
        $deadline = $work->deadline;
        $this->fechaSolicitada = ucfirst($deadline->getTranslatedDayName()) . ' ' . $deadline->day . ' de ' . ucfirst($deadline->getTranslatedMonthName()) . ' del ' . $deadline->year;
    }

    public function archive()
    {
        $this->work->status = Status::ARCHIVED->value;
        $this->work->save();
        return redirect()->route('work.show', $this->work->id)->with(['flash.bannerStyle' => 'success', 'flash.banner' => 'Solicitud archivada exitosamente']);
    }

    public function openWork()
    {
        $this->work->status = Status::OPEN->value;
        $this->work->save();
        return redirect()->route('work.show', $this->work->id)->with(['flash.bannerStyle' => 'success', 'flash.banner' => 'Solicitud abierta exitosamente']);
    }

    public function blockWork()
    {
        $this->work->status = Status::BLOCKED->value;
        $this->work->save();
        $this->emit('actionCompleted');
        Mail::to($this->work->client->email)->send(new WorkBlockedByAdmin($this->work));
    }

    public function render()
    {
        return view('livewire.work-show');
    }
}
