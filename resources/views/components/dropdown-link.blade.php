<button 
    {{ $attributes->merge(['class' =>'block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white']) }}
    style="{{ $active ? 'text-transform:uppercase; font-weight:bold; border-bottom:solid 1px' : '' }}">
    {{ $slot }} <span class="fas fa-angle-down"></span>
    </button>
