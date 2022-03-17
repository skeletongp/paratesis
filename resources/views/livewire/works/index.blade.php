<div class="p-6">
    <div
        class="py-4 px-4 mb-6 flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 justify-between items-center">
        <div class="max-w-sm w-full">
            <x-input type='search' label="Buscar" wire:model="search" id="search" name="search">

            </x-input>
        </div>
        <div class="{{ $filter ? 'flex' : 'hidden' }} space-x-4 items-center">
            <span>{{ $filter }}</span>
            <span class="fas fa-times text-red-600" wire:click="resetFilter"></span>
        </div>
    </div>
    <x-list>
        @if ($works->count())
            @foreach ($works as $ind => $work)
                <li
                    class="py-8   px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 relative {{ fmod($ind, 2) == 0 ? 'bg-blue-100' : 'bg-gray-100' }}">
                    <div class="text-lg font-bold uppercase">
                        <a href="{{ route('works.show', $work) }}">
                            <span
                                class="fas fa-book-open mr-2 text-xl md:text-2xl {{ $work->filework ? 'text-green-600' : 'text-red-600' }}"
                                title="{{ $work->filework ? 'Documento disponible' : 'Documento No Disponible' }}"></span>
                            <span>{{ $work->title }}</span>
                        </a>
                    </div> <br>
                    <span class="text-base">
                        <span> <b>Autor(es): </b>{{ $work->authors }} |</span>
                        <span><b>Asesor(es): </b>{{ $work->teachers }} |</span>

                        <span class="hover:text-blue-400 hover:underline cursor-pointer"
                            wire:click="setFilter('university_id', {{ $work->university_id }},'{{ $work->university->name }}')">
                            <b>Institución: </b>{{ $work->university->name }} |
                        </span>
                        <span class="hover:text-blue-400 hover:underline cursor-pointer"
                            wire:click="setFilter('city_id', {{ $work->city_id }},'{{ $work->city->name }}')">
                            <b>Ciudad: </b>{{ $work->city->name }} |
                        </span>
                        <span class="hover:text-blue-400 hover:underline cursor-pointer"
                            wire:click="setFilter('year', {{ $work->year }},'{{ $work->year }}')">
                            {{ $work->year ?: '2022' }}
                        </span>
                    </span>
                    <div class="absolute bottom-1 right-2">
                        <small><b>Subido por: </b> {{ $work->user->name }}</small>
                    </div>
                </li>
            @endforeach
            <div class="my-4 px-2">
                {{$works->links()}}
            </div>
        @else
            <h1 class="text-center uppercase font-bold py-3 text-xl">Sin resultados</h1>
        @endif
    </x-list>
</div>
