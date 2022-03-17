<?php

namespace App\Http\Livewire\Works;

use App\Models\Filework as ModelsFilework;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileWork extends Component
{
    use WithFileUploads;
    
    public $files = [];
    public $work_id, $error=false;
    public function render()
    {
        return view('livewire.works.file-work');
    }
    public function updatedFiles()
    {
        //$fileType = strtolower(pathinfo($this->files[0],PATHINFO_EXTENSION));
        $file=$this->files[0];
        $type=pathinfo($file->getRealPath(), PATHINFO_EXTENSION);
       
        if ($type=='pdf') {
            $path1=$file->getRealPath();
            $path2='storage/pdfs/'.date('Y_m_d H_i_s').'.pdf';
            rename($path1,$path2);
            ModelsFilework::create([
                'path'=>asset($path2),
                'work_id'=>$this->work_id,
            ]);
            $this->emit('showWork');
        } else {
            $this->error=true;
        }
        
        
    }
}
