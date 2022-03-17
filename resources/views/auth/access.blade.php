<x-guest-layout>
    <div class=" bg-gray-300">
        
        <div class=" w-screen h-screen flex justify-center items-center">
            <div class="p-8 bg-white rounded-lg max-w-sm w-full pb-10">
                <div class="flex justify-center mb-4"> <img src="{{ asset('storage/asset/logo.png') }}" width="70">
                </div>
                <div class="flex justify-center items-center my-3 pb-4">
                    <hr class="w-full">
                    <span class="p-2 text-gray-400 mb-1 uppercase">acceder</span>
                    <hr class="w-full">
                </div>
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="w-full mb-4 pb-4">
                        <x-input label="Correo Electrónico" id="email" name="email">
                            <x-slot name="icon">
                                <span class="fas fa-user"></span>
                            </x-slot>
                        </x-input>
                        <x-input-error for="email"></x-input-error>
                    </div>

                    <div class="w-full my-4 pb-4">
                        <x-input label="Contraseña" id="password" name="password" type="password">
                            <x-slot name="icon">
                                <span class="fas fa-lock"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <div class="w-full">
                        <x-button>
                            <span class="uppercase font-bold">
                                Acceder
                            </span>
                        </x-button>
                    </div>

                    
                </form>

                <div class="flex justify-center items-center mt-3">
                    <hr class="w-full">
                    <span class="p-2 text-gray-400 mb-1 uppercase">registrarse</span>
                    <hr class="w-full">
                </div>
               
                <a href="{{route('auth.redirect')}}"
                    class="flex space-x-4 items-center justify-center uppercase h-12 mt-3 text-black w-full rounded bg-red-200 hover:bg-red-800 hover:text-white">
                    <span class="fab fa-google text-2xl "></span> <span>Google</span> </a>
            </div>
        </div>
    </div>
</x-guest-layout>
