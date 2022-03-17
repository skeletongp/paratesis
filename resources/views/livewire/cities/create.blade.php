<div>
    <x-modal name="createCity" title="Registro de Ciudad">
        <x-slot name="button">
            <span class="fas fa-plus mr-2"></span>
            Añadir
        </x-slot>
        <form wire:submit.prevent="storeCity">
            <div class="my-4 py-4">
                <x-input label="Nombre de la ciudad" name="name" id="name" wire:model.defer="name"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
            <div class="my-4 py-4">
                <x-input label="Código del País" name="country_code" id="country_code" wire:model.defer="country_code"></x-input>
                <x-input-error for="country_code"></x-input-error>
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
            Livewire.on('cityCreateTrigger', () => {
                toggleModal('createCity', false);
                toggleModal('createCity', true);
            })
        </script>
    @endpush

</div>
