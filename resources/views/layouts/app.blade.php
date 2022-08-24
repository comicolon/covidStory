<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- 구글 애드센스 -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9211697104889412"
                crossorigin="anonymous"></script>

        <title>{{ config('app.name', 'Covid Story') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>   --}}
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/ko.js"></script> --}}
        <script src="{{ URL::asset('js/jquery/jquery-3.6.0.min.js') }}"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="">
        {{-- <x-jet-banner /> --}}

        <div class="">
            @livewire('navigation-menu')



            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <div class="flex h-auto min-h-full pb-56 w-full">
                {{-- @if (preg_match("/covidInfo/", $path) || preg_match("/covidNews/", $path)) --}}
                <div class="">
                    @include('components.left-menu')
                </div>
                {{-- @endif --}}

                <!-- Page Content -->
                <div class="flex-row w-full">
                    @yield('content')
                </div>
                <div class="">
                    @include('components.right-menu')
                </div>
            </div>

            <footer class="footer h-32 position-relative">
                @include('.components.footer')
            </footer>

        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
