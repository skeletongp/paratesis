@props(['button'])
<div
    {{ $attributes->merge(['class' =>'hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600']) }}>
    <ul class="py-1 px-2" aria-labelledby="{{ $button }}">
        {{$slot}}
    </ul>

</div>
