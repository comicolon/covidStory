@extends('layouts.app')
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
                @foreach($totalList as $item)
                    <li class="flex border-b">
                        <div class="rating_site w-16 text-white">
                            <p class="flex justify-center">{{$item->rating}}</p>
                            <p class="site_name flex justify-center text-sm">{{$item->site_name}}</p>
                        </div>
                        <div class="flex-row w-full">
                            <a href="{{$item->url}}" class="best_list_item" num="{{$item->num}}" site_name="{{$item->site_name}}">
                                <p class="w-72 truncate md:w-full">{!! $item->title !!}</p>
                            </a>
                            <div class="flex text-gray-400 text-sm">
                                <p>{{$item->write_datetime}}</p>
                                <p class="ml-auto">{{$item->writer}}</p>
                            </div>
                        </div>
                    </li>


                @endforeach
            </ul>
        </div>


   </div>



@endsection
