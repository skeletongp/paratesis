<div class="max-w-4xl mx-auto">

    <x-list>

        <li class="py-4 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 ">
            <div class="text-lg font-bold capitalize">
                <span class="fas fa-book-open mr-2 text-xl md:text-2xl"></span>
                <span>{{ $work->title }}</span>
            </div> <br>
            <div class="text-base flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-3 mb-3">
                <span> <b>Autor(es): </b> {{ $work->authors }}</span>
                <span> <b>Asesor(es): </b> {{ $work->teachers }}</span>
                <span> <b>Institución: </b> {{ $work->university->name }} ({{ $work->university->acronym }})</span>
                <span> <b>Ciudad: </b> {{ $work->city->name }}</span>
                <span> <b>Año: </b> {{ $work->year }}</span>
            </div>
            <div class="text-base my-3 md:my-6">
                <span class="font-bold uppercase text-lg">Objetivo: </span>
                <p>{{ $work->target }}</p>
            </div>
            <div class="text-base my-3 md:my-6">
                <span class="font-bold uppercase text-lg">Metodología: </span>
                <p>{{ $work->methodology }}</p>
            </div>
            <div class="text-base my-3 md:my-6">
                <span class="font-bold uppercase text-lg">Resultados: </span>
                <p>{{ $work->results }}</p>
            </div>
            <div class="text-base my-3 md:my-6">
                <span class="font-bold uppercase text-lg">Recomendaciones: </span>
                <p>{{ $work->recomendations }}</p>
            </div>
        </li>
        @if ($work->filework)
            <div>
                <object data="{{ $work->filework->path }}" type="application/pdf" class="md:h-screen"
                    width="100%">
                    <div class="p-4">
                        Documento Adjunto:
                        <a class="text-blue-300 hover:text-blue-500 hover:underline"
                            href="{{ $work->filework->path }}">Descargar archivo</a>
                    </div>
                </object>
            </div>
        @else
            @can('manage works')
                <livewire:works.file-work :work_id="$work->id" />
            @else
                <div class="flex items-center space-x-4 p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                    role="alert">
                    <span class="fas fa-circle-info"></span>
                    <div>
                        <span class="font-bold">Sin adjunto. </span> No se ha cargado ningún archivo para este trabajo.
                    </div>
                </div>
            @endcan
        @endif

    </x-list>

</div>
