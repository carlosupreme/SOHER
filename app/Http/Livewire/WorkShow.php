<?php

namespace App\Http\Livewire;

use App\Mail\WorkBlockedByAdmin;
use App\Models\Review;
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
    public $modalAssignOpen = false;

    public function mount($work)
    {
        $this->user = Auth::user();
        $this->clientRate = number_format(Review::where('to_user_id', $work->client_id)->avg('rating'), 1);
        $this->work = $work;
        $deadline = $work->deadline;
        $this->fechaSolicitada = sprintf(
            "%s %d de %s del %d",
            $deadline->getTranslatedDayName(),
            $deadline->day,
            $deadline->getTranslatedMonthName(),
            $deadline->year
        );
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

    public function assign()
    {
        $this->emit('modalAssignOpen');
    }

    public function complete()
    {
        //pedir firma
        $this->work->status = Status::FINISHED->value;
        $this->work->save();
        return redirect()->route('work.show', $this->work)->with('flash.banner', 'Solicitud completada');
    }

    public function close()
    {
        //pedir firma
        $this->work->status = Status::CLOSED->value;
        $this->work->save();
        return redirect()->route('work.show', $this->work)->with('flash.banner', 'Solicitud cerrada');
    }

    public function render()
    {
        $assigned = null;
        if ($this->work->status === Status::PROGRESS->value) {
            $assigned = $this->work->assigned->user;
        }

        return view('livewire.work-show', compact('assigned'));
    }
}
