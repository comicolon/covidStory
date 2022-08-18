@extends('layouts.app')


@section('content')
<div class="flex-grow">

    <div class="w-full text-2xl mt-3">
        코로나 뉴스
        <form id="submitform" action="/covidNews" method="post" class="mt-8 w-full"
              enctype="multipart/form-data" onsubmit="return postSubmit()">
            @csrf

                <label for="title" class="text-xl">제목</label>
                <input type="text" id="title" name="title" required
                       class="outline-none border border-blue-400 w-full pl-1 py-1 rounded-lg">

                <label for="content" class="text-xl">내용</label>
                <textarea id="content" name="content" required
                          class=""></textarea>

                <label for="source" class="text-xl">출처</label>
                <input type="text" id="source" name="source" required
                       class="outline-none border border-blue-400 w-full pl-1 py-1 rounded-lg">

{{--            이미지 업로드 주석처리--}}
{{--            <p class="mt-4">--}}
{{--                <label for="image"></label>--}}
{{--                <input type="file" id="image" name="image" accept="image/jpeg,png,jpg,gif,svg">--}}
{{--            </p>--}}

                <input type="submit" value="작성" id="submitPost"
                       class="px-4 py-1 bg-green-500 hover:bg-green-700 text-lg text-white">
                <input type="button" value="취소" onclick="history.back()"
                       class="px-4 py-1 ml-6 bg-red-500 hover:bg-red-700 text-lg text-white">

        </form>
    </div>
</div>

@endsection

@include('.components.board');
