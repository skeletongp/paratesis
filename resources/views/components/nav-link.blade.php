@props(['active' => false])
<a
    {{ $attributes->merge(['class' =>'block py-2 pr-4 pl-3 rounded md:bg-transparent text-blue-700 p-0 dark:text-white']) }} style="{{$active?'text-transform:uppercase; font-weight:bold; border-bottom:solid 1px':''}}">
    {{ $slot }}
</a>
