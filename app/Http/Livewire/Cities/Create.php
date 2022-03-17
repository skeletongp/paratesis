<?php

namespace App\Http\Livewire\Cities;

use App\Models\City;
use Livewire\Component;

class Create extends Component
{
    public $name, $country_code;
    public function render()
    {
        return view('livewire.cities.create');
    }
   


    protected $rules = [
        'name' => 'required|unique:cities,name',
        'country_code' => 'required',
    ];

    public function storeCity()
    {
        $this->emit('cityTrigger');
        $this->emit('cityCreateTrigger');
        $validated = $this->validate();
        City::create($validated);
        $this->name=null;
        $this->country_code=null;
    }
}
