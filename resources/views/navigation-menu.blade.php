<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800 sticky top-0" style="z-index: 1500">
    <div class="container flex flex-wrap justify-between items-center max-w-7xl md:px-6 mx-auto " >
        <a href="#" class="flex items-center">
            <img src="{{ asset('storage/asset/logo.png') }}" class="mr-3 h-6 sm:h-10" alt="Flowbite Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">ParaTesis</span>
        </a>
        <div class="flex items-center md:order-2">
            <button type="button" data-dropdown-placement="bottom"
                class="flex mr-3 text-base bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <div class="w-10 h-10 bg-cover rounded-full bg-center" style="background-image: url({{ auth()->user()->avatar }})">

                </div>
            </button>

            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                id="dropdown">
                <div class="py-3 px-4">
                    <span class="block text-base text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                    <span
                        class="block text-base font-medium text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <form action="{{route('auth.logout')}}" method="post">
                        @csrf
                        <button 
                            class="block py-2 px-4 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Salir</button>
                        </form>
                    </li>

                </ul>
            </div>
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-base text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <span class="fas fa-bars text-xl"></span>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-base  bg-white md:font-medium select-none" >
                <li>
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Inicio
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('works.index') }}" :active="request()->routeIs('works.*')">
                        Trabajos
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('areas.index') }}" :active="request()->routeIs('areas.*')">
                        Áreas
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('cities.index') }}" :active="request()->routeIs('cities.*')">
                        Ciudades
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('universities.index') }}" :active="request()->routeIs('universities.*')">
                        Universidades
                    </x-nav-link>
                </li>

            </ul>
        </div>
    </div>
</nav>
