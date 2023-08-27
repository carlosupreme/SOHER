<?php

namespace App\View\Components;

use App\Models\Work;
use App\Work\Domain\Status;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardStatusCard extends Component
{
    public Status $status;
    public int $counter;

    public function __construct(Status $status)
    {
        $this->status = $status;
        $this->counter = Work::where('client_id', Auth::id())->where('status', $status->value)->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-status-card');
    }
}
