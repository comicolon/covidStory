@extends('layouts.app')
@section('title', '베스트 모아')
@section('content')
    <div class="w-full">
        <div class="flex">
            <h4 class="font-bold p-3 flex-grow">베스트 모아</h4>
        </div>
{{--        <div class="px-1">--}}
{{--            <div class="inline-block px-2 mb-2 bg-cyan-900 text-white rounded-md">--}}
{{--                <span>지난 | </span>--}}
{{--                <span class="px-1">4시간</span>--}}
{{--                <span class="px-1">8시간</span>--}}
{{--                <span class="px-1">12시간</span>--}}
{{--                <span class="px-1">24시간</span>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div>
            <ul class="">
                @for($i=0; $i < count($totalList); $i++)

                    @if ($i % 50 === 0)
                        <div class="max-h-20">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7981523207325760"
                                    crossorigin="anonymous"></script>
                            <!-- 수평형 글사이 광고 -->
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
                    @endif

                    <li class="flex border-b">
                        <div class="rating_site w-16 text-white">
                            <p class="flex justify-center">{{$i+1}}</p>
                            <p class="site_name flex justify-center text-sm">{{$totalList[$i]->site_name}}</p>
                        </div>
                        <div class="flex-row w-full">
                            <a href="{{$totalList[$i]->url}}" class="best_list_item best_sbj_link" num="{{$totalList[$i]->num}}" site_name="{{$totalList[$i]->site_name}}">
                                <p class="w-72 truncate md:w-full">{!! $totalList[$i]->title !!}</p>
                            </a>
                            <div class="flex text-sm">
                                <p class="text-gray-300">{{$totalList[$i]->write_datetime}}</p>
                                <p class="ml-auto text-gray-400">{{$totalList[$i]->writer}}</p>
                            </div>
                        </div>
                    </li>

                @endfor
            </ul>
        </div>


   </div>



@endsection
