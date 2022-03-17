@props(['disabled' => false, 'label' => null, 'labelFor' => '', 'inputClass' => ''])
@php
if (empty($attributes['id'])) {
    $attributes['id'] = 'textarea';
}
@endphp
<label for="{{$attributes['id']}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{$label}}</label>
<select 
    {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 overflow-hidden overflow-ellipsis whitespace-nowrap pr-4 select2'])}}>
   {{$slot}}
</select>
