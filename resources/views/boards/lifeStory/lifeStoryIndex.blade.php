@extends('layouts.app')
@section('content')

    <div class="w-full md:flex">
        <div class="">
            <div class="flex">
                <h4 class="font-bold p-3 flex-grow">일상 이야기</h4>
                @auth
                    <a href="{{route('lifeStoryCreate')}}" class="flex items-center">
                        <button class="bg-green-400 hover:bg-green-500 px-4 py-2 mr-2 float-right
                            text-white rounded-md">글쓰기</button>
                    </a>
                @endauth
            </div>

            <div class="lifeStory_index_header">
                <span class="lifeStory_index_header_id">번호</span>
                <span class="lifeStory_index_header_title">제목</span>
                <span class="lifeStory_index_header_nickname">작성자</span>
                <span class="lifeStory_index_header_views">조회</span>
                <span class="lifeStory_index_header_datetime">작성일</span>
            </div>

            <ul>
                @foreach ($postPacket as $story)
                    <a href="/lifeStory/{{$story->id}}">
                        <li class="block border-b py-1 flex-row hover:bg-emerald-50 md:flex">
                            <div class="lifeStory_index_item_id">
                                <p>{{$story->id}}</p>
                            </div>
                            <div class="lifeStory_index_item_title">
                                <p>{{$story->title}}
                                @if ($story->comment_count != 0)
                                    {{' ('.$story->comment_count.')'}}
                                @endif
                                </p>
                            </div>
                            <div class="flex">
                                <div class="lifeStory_index_item_nickname">
                                    <p>{{$story->nickname}}</p>
                                </div>
                                <div class="lifeStory_index_item_views">
                                    <p>{{$story->views}}</p>
                                </div>
                                <div class="lifeStory_index_item_datetime">
                                    <span class="write_time"> {{$story->created_at->format('Y/m/d?H:i:s')}}</span>
                                </div>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
{{--            {{dd($nowPagePaket, $totalViewPage)}}--}}

            <div name="paging" class="flex justify-center mt-2">
                @if ($isFirst == false)
                    <a href="/lifeStory?page={{ ($nowPagePaket - 1) * $pageViewCount + 1}}">
                        <img src="/images/arr_left.png">
                    </a>
                @endif
                @for($i = ($nowPagePaket * $pageViewCount) + 1; $i <= $totalViewPage; $i++)
                    <a href="/lifeStory?page={{$i}}">
                        <button class="px-1 py-0 mx-1 border border-indigo-400">{{$i}}</button>
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
