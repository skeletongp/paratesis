<div>
    <div
        class="py-4 px-4 mb-6 flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 justify-between items-center">
        <div class="max-w-sm w-full">
            <x-input type='search' label="Buscar" wire:model="search" id="search" name="search">
            </x-input>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" >
        @if ($areas->count())
            @foreach ($areas as $area)
                <x-card :model="$area" name="areas">
                    <livewire:areas.edit :areaModel="$area" :wire:key="$area->id" />
                    <x-light-button name="none{{ $area->id }}" class="deleteArea" 
                        data-area="{{ $area->id }}"> <span class="fas fa-trash-alt text-red-600"></span>
                    </x-light-button>
                </x-card>
            @endforeach
            <div class="md:col-span-3 w-full my-4 px-3">
                {{ $areas->links() }}
            </div>
        @else
            <h1 class="text-center md:col-span-3 uppercase font-bold py-3 text-xl">Sin resultados</h1>
        @endif
    </div>

    @push('js')
        <script>
            $(document).ready(function() {
                setAction();
            })
           
            function setAction() {
                $('.deleteArea').on('click', function() {
                    id = $(this).attr('data-area');
                    console.log(id)
                    Swal.fire({
                        title: '¿Desea borrar el registro?',
                        text: "Una vez borrado, no podrá recuperarlo",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Proceder',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('deleteArea', id);
                            Swal.fire(
                                'Registro Borrado',
                                '',
                                'success'
                            )
                        }
                    });

                })
            }
        </script>
    @endpush
</div>
