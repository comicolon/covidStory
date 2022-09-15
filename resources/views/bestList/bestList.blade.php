@extends('layouts.app')
@section('title', '나우 베스트 ')
@section('content')
    <div class="w-full">
        <div class="flex">
            <h4 class="font-bold p-3 flex-grow">나우 베스트</h4>
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
{{--                  구글 광고  --}}
                    @if ($i % 50 === 0 && $i != 0)
                        <div class="max-h-28">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7981523207325760"
                                    crossorigin="anonymous"></script>
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-format="fluid"
                                 data-ad-layout-key="-hz-4+2b-1w-4a"
                                 data-ad-client="ca-pub-7981523207325760"
                                 data-ad-slot="2439205048"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    @endif

                    <li class="flex border-b">
                        <div class="rating_site w-16 text-white rounded-md">
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
