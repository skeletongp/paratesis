<?php

namespace App\Http\Livewire\Areas;

use App\Models\Area;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class Create extends Component
{
    public $career, $area;
    public function render()
    {
        return view('livewire.areas.create');
    }


    protected $rules = [
        'career' => 'required|unique:areas,career',
        'area' => 'required',
    ];

    public function storeArea()
    {
        $this->emit('areaTrigger');
        $this->emit('areaCreateTrigger');
        $validated = $this->validate();
        Area::create($validated);
        $this->career=null;
        $this->area=null;
    }
}
