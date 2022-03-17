<?php

namespace App\Http\Livewire\Universities;

use App\Models\University;
use Livewire\Component;

class Edit extends Component
{
        
    public $name, $acronym;
    public University $university;
    public function render()
    {
        $this->name=$this->university->name;
        $this->acronym=$this->university->acronym;
        return view('livewire.universities.edit');
    }
    protected $rules = [
        'name' => 'required',
        'acronym' => 'required',
    ];

    function editUniversity(){
        $this->emit('uniTrigger');
        $this->emit('universityEditTrigger'.$this->university->id, $this->university->id);
        $validated = $this->validate();
        $this->university->update($validated);
    }
}
