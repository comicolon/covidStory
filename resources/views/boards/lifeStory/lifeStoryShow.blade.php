@extends('layouts.app')
@section('content')
    <section class="">
        <div class="h-16">
        </div>
        <div class="board_title">
            {{$lifeStoryBoard -> title}}
        </div>
        <div class="flex my-3 w-100%">
            <div class="mx-3 flex-grow flex">
                <p class="text-sm px-2 flex items-center">작성자</p><p class="text-base">{{$lifeStoryBoard -> nickname}}</p>
            </div>
            <div class="mx-3 flex">
                <p class="jb-small px-2 flex items-center">조회수</p><p class="">{{$lifeStoryBoard -> views}}</p>
            </div>
            <div class="mx-3 flex">
                <p class="text-xs flex items-center">{{$lifeStoryBoard -> created_at}}</p>
            </div>
        </div>
        <div class="px-3 pb-3 mx-3">
            <small>출처 : {{$lifeStoryBoard -> source}}</small>
        </div>
        <div class="text-lg border py-3 px-3">
            {!! $lifeStoryBoard-> content !!}
        </div>
{{--        버튼--}}
        <div class="">
            <a href="{{route('lifeStory')}}">
                <button class="board_to_list">목록</button>
            </a>
            @if(Auth::user()->id == $lifeStoryBoard->u_id)
                <a href="{{route('lifeStoryEdit', $lifeStoryBoard -> id)}}">
                    <button class="board_to_edit">수정</button>
                </a>
                <form action="/lifeStory/{{$lifeStoryBoard -> id}}" method="post" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="board_to_delete">삭제</button>
                </form>
            @endif
        </div>
    </section>


@endsection
