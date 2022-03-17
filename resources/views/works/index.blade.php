<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('Trabajos de Investigación ') }}</span>
            @can('manage works')
                @livewire('works.create')
            @endcan
        </h2>
    </x-slot>
    <div class="bg-white p-3">
        @livewire('works.index',
        ['fieldFilter'=>request('field'),'valueFilter'=>request('value'),'filter'=>request('filter'),'key'=>now()])
    </div>
</x-app-layout>
