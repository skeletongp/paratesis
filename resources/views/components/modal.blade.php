@props(['name' => null, 'width' => 'max-w-sm', 'title'=>'Título del Modal'])
<div>
    <x-light-button name="{{$name}}">
        {{$button}}
    </x-light-button>
<div id="{{ $name ?: 'createArea' }}"  aria-hidden="true"  aria-modal="true" role="dialog"
    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
    <div class="relative px-4 w-full h-full md:h-auto">
        <div class="w-full {{ $width }} mx-auto bg-white rounded-xl px-3 py-4">
            <div class="flex justify-between items-center p-2">
                <h1 class="text-center uppercase text-xl font-bold ">{{$title}}</h1>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="{{ $name ?: 'createArea' }}">
                    <span class="fas fa-times text-red-600"></span>
                </button>
            </div>
            <div class="p-3 w-full">
                {{ $slot }}
            </div>

        </div>

    </div>
</div>
</div>
