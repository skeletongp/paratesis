<div>
    <x-modal name="createUniversity" title="Registro de Universidad">
        <x-slot name="button">
            <span class="fas fa-plus mr-2"></span>
            Añadir
        </x-slot>
        <form wire:submit.prevent="storeUniversity">
            <div class="my-4 py-4">
                <x-input label="Universidad/Institución" name="name" id="name" wire:model.defer="name"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
            <div class="my-4 py-4">
                <x-input label="Siglas/Acrónimo" name="acronym" id="acronym" wire:model.defer="acronym"></x-input>
                <x-input-error for="acronym"></x-input-error>
            </div>

            <x-button> 
                <div class="flex space-x-2 items-center w-max mx-auto">
                    <div class="animate-spin rounded-full h-5 w-5 flex items-center justify-center  " wire:loading>
                        <span class="fas fa-spinner"></span></div> 
                    <span>Guardar</span>
                </div>

            </x-button>

        </form>
    </x-modal>
    @push('js')
        <script>
            Livewire.on('uniCreateTrigger', () => {
                toggleModal('createUniversity', false);
                toggleModal('createUniversity', true);
            })
        </script>
    @endpush

</div>
