<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('Ciudades') }}</span>
                @livewire('cities.create')
        </h2>
    </x-slot>
    <div class="bg-white p-3">
       @livewire('cities.index', ['key'=>now()])
    </div>
</x-app-layout>
