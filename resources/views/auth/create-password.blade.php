<x-guest-layout>
    <div class=" bg-gray-300">
        <div class=" w-screen h-screen flex justify-center items-center">
            <div class="p-8 bg-white rounded-lg max-w-sm w-full pb-10">
                <div class="flex justify-center mb-4"> <img src="{{ asset('storage/asset/logo.png') }}" width="70">
                </div>
                <div class="flex justify-center items-center mt-3">
                    <hr class="w-full">
                    <span class="p-2 text-gray-400 mb-1 uppercase">contraseña</span>
                    <hr class="w-full">
                </div>
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="w-full my-4 pb-4">
                        <x-input label="Nueva Contraseña" id="password" name="password" type="password">
                            <x-slot name="icon">
                                <span class="fas fa-lock"></span>
                            </x-slot>
                        </x-input>
                        <x-input-error for="password"></x-input-error>
                        <x-input-error for="name"></x-input-error>
                        <x-input-error for="email"></x-input-error>
                        <x-input-error for="avatar"></x-input-error>
                    </div>
                    <div class="w-full my-4 pb-4">
                        <x-input label="Repetir Contraseña" id="password_confirmation" name="password_confirmation" type="password">
                            <x-slot name="icon">
                                <span class="fas fa-lock"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <input type="hidden" name="name" value="{{ $fields['name'] }}" />
                    <input type="hidden" name="email" value="{{ $fields['email'] }}" />
                    <input type="hidden" name="avatar" value="{{ $fields['avatar'] }}" />
                  
                    <div class="w-full">
                        <x-button>
                            <span class="uppercase font-bold">
                                Acceder
                            </span>
                        </x-button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</x-guest-layout>
