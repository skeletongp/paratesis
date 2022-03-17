<?php

namespace App\Http\Livewire\Cities;

use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $listeners = ['cityTrigger', 'deleteCity'];
    public $search='';
    public function render()
    {
        $cities=City::with('works')->search($this->search)->orderBy('name')->paginate(9);
        return view('livewire.cities.index',['cities'=>$cities]);
    }

    public function cityTrigger()
    {
        $this->resetPage();
    }
    public function deleteCity($id)
    {
        $city=City::find($id);
        $city->delete();
        $this->render();
    }
}
