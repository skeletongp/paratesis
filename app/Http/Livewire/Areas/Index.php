<?php

namespace App\Http\Livewire\Areas;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $listeners = ['areaTrigger', 'deleteArea'];
    public $search='';

    public function render()
    {
        $areas=null;
        $areas = Area::with('works')->search($this->search)->orderBy('career')->paginate(9);
        
        return view('livewire.areas.index', ['areas' => $areas]);
    }

    public function areaTrigger()
    {
        $this->resetPage();
    }
    public function updated(){
        $this->resetPage();
        $this->emit('reload');
    }
    
    public function deleteArea($id)
    {
        $area=Area::find($id);
        $area->delete();
        $this->resetPage();
        $this->render();
    }
}
