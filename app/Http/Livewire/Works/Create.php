<?php

namespace App\Http\Livewire\Works;

use App\Models\Area;
use App\Models\City;
use App\Models\University;
use App\Models\Work;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class Create extends Component
{
    public $authors='', $teachers='', $title, $year, $target, $methodology, $results, $recomendations, $area_id, $university_id, $city_id;
    public $areas, $universities, $cities;
    public $aName, $aLastname, $tName, $tLastname;
    public $created=false;
    public function render()
    {
        $this->getRelated();
        return view('livewire.works.create');
    }

    public function getRelated()
    {
        $this->areas=Area::get();
        $this->universities=University::get();
        $this->cities=City::get();
    }

    protected $rules = [
        'authors' => 'required',
        'teachers' => 'required',
        'title' => 'required|max:255',
        'year' => 'required|numeric|min:1988',
        'target' => 'required|max:650',
        'methodology' => 'required|max:650',
        'results' => 'required|max:650',
        'recomendations' => 'required|max:650',
        'area_id' => 'required|exists:areas,id',
        'university_id' => 'required|exists:universities,id',
        'city_id' => 'required|exists:cities,id',
    ];

    public function storeWork()
    {
        $this->emit('workTrigger');
        $validated = $this->validate();
        Work::create($validated);
       
        $this->resetExcept('city_id');
        $this->created=true;
    }
    public function createAuthor(){
        $this->emit('workTrigger');
        $this->validate([
            'aName'=>'required',
            'aLastname'=>'required',
        ]);
        $this->authors=$this->authors.$this->aLastname.', '.$this->aName.'; ';
        $this->aName=null;
        $this->aLastname=null;
    }
    public function clearAuthor()
    {
        $this->emit('workTrigger');
        $this->authors='';
    }
    public function clearTeacher()
    {
        $this->emit('workTrigger');
        $this->teachers='';
    }
    public function createTeacher(){
        $this->emit('workTrigger');
        $this->validate([
            'tName'=>'required',
            'tLastname'=>'required',
        ]);
        $this->teachers=$this->teachers.$this->tLastname.', '.$this->tName.'; ';
        $this->tName=null;
        $this->tLastname=null;
    }
    public function updating()
    {
        $this->emit('workTrigger');
    }
    public function updatedALastName()
    {
        $this->createAuthor();
    }
    public function updatedTLastName()
    {
        $this->createTeacher();
    }
}
