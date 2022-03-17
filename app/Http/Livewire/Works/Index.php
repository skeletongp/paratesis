<?php

namespace App\Http\Livewire\Works;

use App\Models\Work;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search='', $fieldFilter, $valueFilter, $filter;
    protected $listeners = ['workTrigger'];
    public function render()
    {
        
        return view('livewire.works.index',[
            'works'=>Work::search($this->search)->filter($this->fieldFilter, $this->valueFilter)->orderBy('title')->with('city', 'university','filework')->paginate(2)
        ]);
    }
    public function workTrigger()
    {
        $this->resetPage();
    }
    public function setFilter($field, $value, $filter)
    {
       $this->fieldFilter = $field;
       $this->valueFilter = $value;
       $this->filter = $filter;
    }
    public function resetFilter()
    {
        $this->fieldFilter = null;
       $this->filter = null;
    }
}
