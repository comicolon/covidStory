@extends('layouts.app')
@section('content')
    <section class="">
        <div class="h-16">
        </div>
        <div class="board_title">
            {{$post -> title}}
        </div>
        <div class="flex my-3 w-100%">
            <div class="mx-3 flex-grow flex">
                <p class="text-sm px-2 flex items-center">작성자</p><p class="text-base">{{$post -> nickname}}</p>
            </div>
            <div class="mx-3 flex">
                <p class="jb-small px-2 flex items-center">조회수</p><p class="">{{$post -> views}}</p>
            </div>
            <div class="mx-3 flex">
                <p class="text-xs flex items-center">{{$post -> created_at}}</p>
            </div>
        </div>
        <div class="px-3 pb-3 mx-3">
            <small>출처 : {{$post -> source}}</small>
        </div>
        <div class="text-lg border py-3 px-3">
            {!! $post-> content !!}
        </div>
{{--        버튼--}}
        <div class="">
            <a href="{{route('lifeStory')}}">
                <button class="board_to_list">목록</button>
            </a>
            @auth
            @if(Auth::user()->id == $post->u_id)
                <a href="{{route('lifeStoryEdit', $post -> id)}}">
                    <button class="board_to_edit">수정</button>
                </a>
                <form action="/lifeStory/{{$post -> id}}" method="post" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="board_to_delete">삭제</button>
                </form>
            @endif
            @endauth
        </div>
    </section>

@include('components.comment')

@endsection
