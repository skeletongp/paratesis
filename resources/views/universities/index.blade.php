<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('Universidades') }}</span>
                @livewire('universities.create')
        </h2>
    </x-slot>
    <div class="bg-white p-3">
       @livewire('universities.index', ['key'=>now()])
    </div>
</x-app-layout>
