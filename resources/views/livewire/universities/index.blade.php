<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @if ($universities->count())
            @foreach ($universities as $university)
                <div
                    class="relative p-6  bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 block  max-w-sm">

                    <div class="flex absolute top-2 right-2 justify-end space-x-4 items-center">
                        <livewire:universities.edit :university="$university" :wire:key="$university->uid" />
                        <x-light-button class="deleteUniversity" data-university="{{ $university->id }}"> <span
                                class="fas fa-trash-alt text-red-600"></span></x-light-button>
                    </div>
                    <div class="pt-8">
                        <a href="{{ route('works.index', ['field' => 'university_id','value' => $university->id,'filter' => $university->name]) }}"
                            class="">
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-full overflow-hidden overflow-ellipsis whitespace-nowrap ">
                                {{ $university->name }}</h5>
                            <div class="flex justify-between">
                                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $university->acronym }}.</p>
                                <p class="font-normal text-gray-700 dark:text-gray-400">
                                    {{ $university->works->count() }}.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="w-full my-4 px-3">
                {{ $universities->links() }}
            </div>
        @else
            <h1 class="text-center md:col-span-3 uppercase font-bold py-3 text-xl">Sin resultados</h1>
        @endif
    </div>
    @push('js')
        <script>
            $('document').ready(function() {
                $('.deleteUniversity').each(function() {
                    $(this).on('click', function() {
                        id = $(this).attr('data-university');
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
                                Livewire.emit('deleteUniversity', id);
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
