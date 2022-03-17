<?php

namespace App\Http\Livewire\Universities;

use App\Models\University;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $listeners = ['uniTrigger','deleteUniversity'];
    public function render()
    {
        $universities=University::paginate(9);
        return view('livewire.universities.index',['universities'=>$universities]);
    }
    public function uniTrigger()
    {
        $this->resetPage();
    }
    public function deleteUniversity($id)
    {
        $university=University::find($id);
        $university->delete();
        $this->render();
    }
}
