@extends('layouts.app')
@section('content')

    <div class="flex-grow">
        <div class="mx-auto my-auto px-8 py-4">
            <div class="flex">
                <h4 class="font-bold p-3 flex-grow">일상 이야기</h4>
                @auth
                    <a href="{{route('lifeStoryCreate')}}" class="flex items-center">
                        <button class="bg-green-400 hover:bg-green-500 px-4 py-2 float-right
                         text-white rounded-md">글쓰기</button>
                    </a>
                @endauth
            </div>
            <ul>
                @foreach ($postPacket as $story)
                    <a href="/lifeStory/{{$story->id}}">
                        <li class="block border-b m-3 flex">
                            <div class="mx-10 flex-0">
                                <small class="text-gray-400">{{$story->id}}</small>
                            </div>
                            <div class="flex-grow">
                                <p class="text-base">{{$story->title}}</p>
                            </div>
                            <div class=" flex-0 mx-3 flex justify-center items-center w-20">
                                <p>{{$story->nickname}}</p>
                            </div>
                            <div class="flex-0 mx-3 flex justify-center items-center w-20">
                                <p class="text-gray-400 text-sm">{{$story->views}}</p>
                            </div>
                            <div class="flex-0 mx-3 flex items-center">
                                <p class="text-gray-400 text-xs"> {{$story->created_at}}</p>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
{{--            {{dd($nowPagePaket, $totalViewPage)}}--}}

            <div name="paging" class="flex justify-center">
                @if ($isFirst == false)
                    <a href="/lifeStory?page={{ ($nowPagePaket - 1) * $pageViewCount + 1}}">
                        <img src="/images/arr_left.png">
                    </a>
                @endif
                @for($i = ($nowPagePaket * $pageViewCount) + 1; $i <= $totalViewPage; $i++)
                    <a href="/lifeStory?page={{$i}}">
                        <button class="px-2 py-0 mx-2 border border-indigo-400">{{$i}}</button>
                    </a>
                @endfor
                @if ($isEnd == false)
                    <a href="/lifeStory?page={{ ($nowPagePaket+1) * $pageViewCount + 1}}">
                        <img src="/images/arr_right.png">
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
