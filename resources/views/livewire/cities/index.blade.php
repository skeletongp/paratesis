<div>
    <div
        class="py-4 px-4 mb-6 flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 justify-between items-center">
        <div class="max-w-sm w-full">
            <x-input type='search' label="Buscar" wire:model="search" id="search" name="search">
            </x-input>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="content">

        @foreach ($cities as $city)
            <x-card :model="$city" name="cities">
                <livewire:cities.edit :city="$city" :wire:key="$city->uid" />
                <x-light-button class="deleteCity" data-city="{{ $city->id }}"> <span
                        class="fas fa-trash-alt text-red-600"></span></x-light-button>
            </x-card>
        @endforeach
    </div>
    @if ($cities->count())
        <div class="w-full my-4 px-3">
            {{ $cities->links() }}
        </div>
    @endif
    @push('js')
        <script>
           
            $('document').ready(function() {
                $('.deleteCity').each(function() {
                    $(this).on('click', function() {
                        id = $(this).attr('data-city');
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
                                Livewire.emit('deleteCity', id);
                                Swal.fire(
                                    'Registro Borrado',
                                    '',
                                    'success'
                                )
                            }
                        });

                    })
                })

            })
        </script>
    @endpush
</div>
