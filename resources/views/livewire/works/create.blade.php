<div>
    <x-modal name="createWork" title="Registro de Trabajos" width="max-w-3xl my-8">
        <x-slot name="button">
            <span class="fas fa-plus mr-2"></span>
            Añadir
        </x-slot>
        <div class="{{ $created ? 'flex' : 'hidden' }} p-4 mb-4 text-sm items-center justify-between   text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert">
            <span class="fas fa-circle-info mr-2"></span>
            <div>
                <span class="font-medium">¡Trabajo Registrado!</span> Gracias por colaborar con nuestra base de datos.
            </div>
            <span class="fas fa-times text-red-600" wire:click="$set('created',false)"></span>
        </div>
        <form wire:submit.prevent="storeWork">
            <div class="my-4  flex flex-col space-y-4 relative w-full">
                <label for="" class="text-sm">Autores</label>
                <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 ">
                    <div class="w-full">
                        <x-input label="Nombre" name="aName" id="aName" wire:model.lazy="aName"
                            wire:keydown.enter.prevent="createAuthor"></x-input>
                        <x-input-error for="aName"></x-input-error>
                        <x-input-error for="authors">Añada por lo menos un autor</x-input-error>
                    </div>
                    <div class="w-full">
                        <x-input label="Apellidos" name="aLastname" id="aLastname" wire:model.lazy="aLastname"
                            wire:keydown.enter.prevent="createAuthor"></x-input>
                        <x-input-error for="aLastname"></x-input-error>
                    </div>
                </div>
                <small class="">
                    @if (strlen($authors) > 2)
                        <span>
                            <sup>
                                <span class="fas fa-times text-red-40 mr-3 cursor-pointer"
                                    wire:click="clearAuthor"></span>
                            </sup>
                            {{ $authors }}
                        </span>
                    @endif
                </small>

            </div>
            <div class="my-4   flex flex-col space-y-4 relative w-full">

                <label for="" class="text-sm">Asesores</label>
                <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 ">
                    <div class="w-full">
                        <x-input label="Nombre" name="tName" id="tName" wire:model.lazy="tName"
                            wire:keydown.enter.prevent="createTeacher"></x-input>
                        <x-input-error for="tName"></x-input-error>
                        <x-input-error for="teachers">Añada por lo menos un asesor</x-input-error>
                    </div>
                    <div class="w-full">
                        <x-input label="Apellidos" name="tLastname" id="tLastname" wire:model.lazy="tLastname"
                            wire:keydown.enter.prevent="createTeacher"></x-input>
                        <x-input-error for="tLastname"></x-input-error>
                    </div>
                </div>
                <small class="">
                    @if (strlen($teachers) > 2)
                        <span>
                            <sup>
                                <span class="fas fa-times text-red-40 mr-3 cursor-pointer"
                                    wire:click="clearTeacher"></span>
                            </sup>
                            {{ $teachers }}
                        </span>
                    @endif
                </small>
            </div>
            <div class="my-4  flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 relative">
                <div class="w-full ">
                    <x-input label="Título" name="title" id="title" wire:model.defer="title"></x-input>
                    <x-input-error for="title"></x-input-error>
                </div>
                <div class="w-40">
                    <x-input label="Año" type="number" name="year" id="year" wire:model.defer="year"></x-input>
                    <x-input-error for="year"></x-input-error>
                </div>
            </div>
            <div class="my-4  flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 relative">
                <div class="w-full">
                    <x-select label="Área" name="area_id" id="area_id" wire:model="area_id">
                        <option value="">Seleccione</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->career }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="area_id"></x-input-error>
                </div>

                <div class="w-full">
                    <x-select label="Universidad" name="university_id" id="university_id" wire:model="university_id">
                        <option value="">Seleccione</option>
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="university_id"></x-input-error>
                </div>
                <div class="w-full">
                    <x-select label="Ciudad" name="city_id" id="city_id" wire:model="city_id">
                        <option value="">Seleccione</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="city_id"></x-input-error>
                </div>

            </div>



            <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 ">
                <div class="w-full">
                    <x-textarea label="Objetivo" name="target" id="target" wire:model="target">
                    </x-textarea>
                    <x-input-error for="target"></x-input-error>
                </div>

                <div class="w-full">
                    <x-textarea label="Metodología" name="methodology" id="methodology" wire:model.defer="methodology">
                    </x-textarea>
                    <x-input-error for="methodology"></x-input-error>
                </div>
            </div>
            <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 ">
                <div class="w-full">
                    <x-textarea label="Resultados" name="results" id="results" wire:model.defer="results">
                    </x-textarea>
                    <x-input-error for="results"></x-input-error>
                </div>

                <div class="w-full">
                    <x-textarea label="Recomendaciones" name="recomendations" id="recomendations"
                        wire:model.defer="recomendations">
                    </x-textarea>
                    <x-input-error for="recomendations"></x-input-error>
                </div>
            </div>

            <x-button class="mt-6">
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
            Livewire.on('workTrigger', () => {
                toggleModal('createWork', false);
                toggleModal('createWork', true);
            })
        </script>
    @endpush

</div>
