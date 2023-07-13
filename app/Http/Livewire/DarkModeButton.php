<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DarkModeButton extends Component
{
    public $darkMode;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.dark-mode-button');
    }

    public function toggleDarkMode(): void
    {
        $this->darkMode = !$this->darkMode;
        $this->dispatchBrowserEvent('darkMode', ['darkMode' => $this->darkMode]);
    }
}
