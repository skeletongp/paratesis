<?php

namespace App\Http\Livewire\Areas;

use App\Models\Area;
use Livewire\Component;

class Edit extends Component
{
    public $career, $area;
    public Area $areaModel;
    public function render()
    { $this->career=$this->areaModel->career;
        $this->area=$this->areaModel->area;
        return view('livewire.areas.edit');
    }
    protected $rules = [
        'career' => 'required',
        'area' => 'required',
    ];

    function editArea(){
        $this->emit('areaTrigger');
        $this->emit('areaEditTrigger'.$this->areaModel->id, $this->areaModel->id);
        $validated = $this->validate();
        $this->areaModel->update($validated);
    }
}
