<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css" />
    <link rel="stylesheet" href="{{ asset('css/fa/css/all.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @livewireStyles
    <!-- Scripts -->
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="{{asset('js/actions.js')}}"></script>
</head>

<body class="font-sans antialiased">


    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="p-3 max-w-7xl mx-auto">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select').select2({
                theme: "classic",
                placeholder: "Seleccione una opción",
                allowClear: true,
                language: "es"

            })
           
            $('.select2').each(function() {
                $(this).css('width','100%')
            })
            $('.select2-selection--single').each(function() {
                $(this).addClass('w-full')
            })
        })
    </script>
    @stack('js')
    <style>
        .select2-selection__rendered{
            font-size:1rem;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }
        
    </style>
    @stack('css')
</body>

</html>
