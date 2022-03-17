<?php

namespace App\Http\Livewire\Universities;

use App\Models\University;
use Livewire\Component;

class Create extends Component
{
    public $name, $acronym;
    public function render()
    {
        return view('livewire.universities.create');
    }
   


    protected $rules = [
        'name' => 'required|unique:universities,name',
        'acronym' => 'required',
    ];

    public function storeUniversity()
    {
        $this->emit('uniTrigger');
        $this->emit('uniCreateTrigger');
        $validated = $this->validate();
        University::create($validated);
        $this->name=null;
        $this->acronym=null;
    }
}
