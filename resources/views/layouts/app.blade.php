<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- 구글 애드센스 -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7981523207325760"
                crossorigin="anonymous"></script>
        <!-- 구글 애널리틱스 -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-DW9L6TT00E"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-DW9L6TT00E');
        </script>
        <!-- 네이버 소유 확인 -->
        <meta name="naver-site-verification" content="30998c16c4dc864e14279f6fce86c54b19ca7b61" />

        <!-- 페이지 설명 -->
        <meta name="description" content="코로나 시대, 하소연 할 곳 없는 지친 사람들의 쉼터 입니다. 한 번  감염 되었다 하더라도
            재감염 될 수도 있는 코로나, 각자의 이야기들을 풀어 놓는 곳 입니다.">

        <!-- 콘텐츠 마크업 -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="코스토리 - 코로나 이야기">
        <meta property="og:description" content="코로나 시대, 하소연 할 곳 없는 지친 사람들의 쉼터 입니다. 한 번  감염 되었다 하더라도
            재감염 될 수도 있는 코로나, 각자의 이야기들을 풀어 놓는 곳 입니다.">
        <meta property="og:image" content="https://costory.kr/images/logo_02.png">
        <meta property="og:url" content="https://costory.kr">

{{--        <title>{{ config('app.name', 'Covid Story') }}</title>--}}
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>   --}}
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/ko.js"></script> --}}
        <script src="{{ URL::asset('js/jquery/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ URL::asset('js/autoLink/autolink.js') }}"></script>



        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="">
        {{-- <x-jet-banner /> --}}

        <div class="wrap">
            @livewire('navigation-menu')



            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <div class="page_full_except_header">
                {{-- @if (preg_match("/covidInfo/", $path) || preg_match("/covidNews/", $path)) --}}
                <div class="">
                    @include('components.left-menu')
                </div>
                {{-- @endif --}}

                <!-- Page Content -->
                    <div class="page_content">
                        {{--           모바일 광고             --}}
                        <div class="w-full flex justify-center md:hidden">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7981523207325760"
                                    crossorigin="anonymous"></script>
                            <!-- 네비 아래 컨텐츠 상단 모바일 -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:300px;height:50px"
                                 data-ad-client="ca-pub-7981523207325760"
                                 data-ad-slot="4827363532"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>

                        {{--          pc 광고         --}}
                        <div class="w-full hidden md:inline-block">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7981523207325760"
                                    crossorigin="anonymous"></script>
                            <!-- 콘텐츠 아래 위 광고 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-7981523207325760"
                                 data-ad-slot="5688981078"
                                 data-ad-format="auto"
                                 data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>

                        @yield('content')

                        <div class="inline-block w-full">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7981523207325760"
                                    crossorigin="anonymous"></script>
                            <!-- 콘텐츠 아래 위 광고 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-7981523207325760"
                                 data-ad-slot="5688981078"
                                 data-ad-format="auto"
                                 data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>

                    </div>

                <div class="">
                    @include('components.right-menu')
                </div>

                <footer class="footer">
                    @include('.components.footer')
                </footer>

            </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
