<?php

namespace App\Http\Livewire\Cities;

use App\Models\City;
use Livewire\Component;

class Edit extends Component
{
    public $name, $country_code;
    public City $city;
    public function render()
    {
        $this->name=$this->city->name;
        $this->country_code=$this->city->country_code;
        return view('livewire.cities.edit');
    }

    protected $rules = [
        'name' => 'required',
        'country_code' => 'required',
    ];

    function editCity(){
        $this->emit('cityTrigger');
        $this->emit('cityEditTrigger'.$this->city->id, $this->city->id);
        $validated = $this->validate();
        $this->city->update($validated);
    }
}
