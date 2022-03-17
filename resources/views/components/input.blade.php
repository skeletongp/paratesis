@props(['disabled' => false, 'label' => null, 'labelFor' => '', 'inputClass' => ''])
<div class="relative z-0 w-full group">
    @php
    if(empty($attributes['id'])){
        $attributes['id']='input';
    }
    @endphp
    <input {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge(['class' =>'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer break-words']) }}
        placeholder=" " />
    <label for="{{ $attributes['id'] }}"
        class="absolute text:sm md:text-lg text-gray-600 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 z-40 origin-[0] left-0 peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">{{ $label }}</label>
    <div class="mx-1 right-2 absolute top-0 bottom-0 ">
        <div class="flex items-center justify-center h-full">
            @if (isset($icon))
                {{ $icon }}
            @endif
        </div>
    </div>
</div>