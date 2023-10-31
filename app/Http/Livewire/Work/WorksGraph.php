<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use App\Work\Domain\Status;
use Livewire\Component;

class WorksGraph extends Component
{
    public $data;

    public function mount()
    {
        $this->data['labels'] = array_map(fn ($v) => ucfirst(__($v)), array_column(Status::cases(), 'value'));
        $this->data['datasets'] = [
            [
                'label' => 'Solicitudes',
                'data' => [
                    $this->getCount(Status::OPEN),
                    $this->getCount(Status::PROGRESS),
                    $this->getCount(Status::FINISHED),
                    $this->getCount(Status::CLOSED),
                    $this->getCount(Status::ARCHIVED),
                    $this->getCount(Status::BLOCKED),
                ],
                'backgroundColor' => [
                    '#3b82f6',
                    '#6b7280',
                    '#22c55e',
                    '#eab308',
                    '#6366f1',
                    '#ef4444'
                ],
                'hoverOffset' => 4
            ],
        ];
    }

    private function getCount(Status $status): int
    {
        return Work::where('status', $status->value)->count();
    }

    public function render()
    {
        return view('livewire.work.works-graph');
    }
}
