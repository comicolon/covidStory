@extends('layouts.app')
@section('content')
<section>
    <form id="submitform" action="/lifeStory" method="post" class="mt-8 w-full"
          enctype="multipart/form-data" onsubmit="return postSubmit()">
        @csrf
        <input type="hidden" id="board_name" value="lifeStory">
        <div class="h-16">
        </div>
        <div class="flex">
            <h3 class="px-3 flex items-center">제목</h3>
            <input type="text" id="title" name="title" required
                   class="outline-none border border-blue-400 flex-grow pl-1 py-1 rounded-lg">
        </div>
        <div class="">
            <h3 class="px-3 py-2">내용</h3>
            <textarea id="content" name="content" required
                      class=""></textarea>
        </div>
        <div class="flex py-3">
            <h4 class="px-3 flex items-center">출처</h4>
            <input type="text" id="source" name="source"
                   class="h-6 outline-none border border-blue-400 flex-grow pl-1 py-1 rounded-lg">
        </div>
        @auth
            <div class="flex justify-end">
                <input type="submit" value="작성" id="submitPost"
                       class="px-3 py-1 bg-emerald-500 hover:bg-emerald-600 text-lg text-white rounded-lg">
                <input type="button" value="취소" onclick="history.back()"
                       class="px-3 py-1 ml-6 bg-rose-500 hover:bg-rose-600 text-lg text-white rounded-lg">
            </div>
        @endauth


</section>
@endsection
    @include('.components.board')
