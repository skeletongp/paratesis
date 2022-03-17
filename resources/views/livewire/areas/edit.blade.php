<div>
    <x-modal name="editArea{{$areaModel->id}}" title="Edición de Área">
        <x-slot name="button">
            <span class="fas fa-pen mr-2"></span>
        </x-slot>
        <form wire:submit.prevent="editArea">
            <div class="my-4 py-4">
                <x-input label="Carrera/Escuela" name="career" id="career" wire:model.defer="career"></x-input>
                <x-input-error for="career"></x-input-error>
            </div>
            <div class="my-4 py-4">
                <x-input label="Área/Facultad" name="area" id="area" wire:model.defer="area">
                </x-input>
                <x-input-error for="area"></x-input-error>
            </div>

            <x-button>
                <div class="flex space-x-2 items-center w-max mx-auto">
                    <div class="animate-spin rounded-full h-5 w-5 flex items-center justify-center  " wire:loading>
                        <span class="fas fa-spinner"></span>
                    </div>
                    <span>Guardar</span>
                </div>

            </x-button>

        </form>
    </x-modal>
    @push('js')
        <script>
            Livewire.on('areaEditTrigger'+{{$areaModel->id}}, areaModel_id => {
                Swal.fire({
                    title:'Registro actualizado',
                    text:'Los datos fueron actualizados exitosamente',
                    icon:'success',
                })
                toggleModal('editArea'+areaModel_id, false);
            })
          
        </script>
    @endpush

</div>
