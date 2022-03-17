<?php

namespace App\Http\Livewire\Works;

use App\Models\Work;
use Livewire\Component;

class Show extends Component
{
    public $work;
    protected $listeners = ['showWork'];
    public function render()
    {
        return view('livewire.works.show');
    }
    public function showWork()
    {
       $this->render();
    }
}
