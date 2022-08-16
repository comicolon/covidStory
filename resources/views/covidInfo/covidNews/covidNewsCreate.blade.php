@extends('layouts.app')
@section('content')
    
<div class="flex-grow">

    <div class="w-full text-2xl text-blue-600 mt-8">코로나 뉴스</div>
        <form action="/covidNews" method="post" class="mt-8 w-full" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="title" class="text-xl">제목</label>
                <input type="text" id="title" name="title" required
                       class="outline-none border border-blue-400 w-full pl-1 py-1 rounded-lg">
            </p>
            <p class="mt-4 h-44">
                <label for="content" class="text-xl">내용</label>
                <textarea id="content" name="content" required
                          class="outline-none border border-blue-400 w-full h-full mt-2 rounded-lg resize-none"></textarea>
            </p>

            <p class="mt-10">
                <label for="source" class="text-xl">출처</label>
                <input type="text" id="source" name="source" required
                       class="outline-none border border-blue-400 w-full pl-1 py-1 rounded-lg">
            </p>

            <p class="mt-4">
                <label for="image"></label>
                <input type="file" id="image" name="image" accept="image/jpeg,png,jpg,gif,svg">
            </p>

            <p class="mt-8">
                <input type="submit" value="작성"
                       class="px-4 py-1 bg-green-500 hover:bg-green-700 text-lg text-white">
                <input type="button" value="취소" onclick="history.back()"
                       class="px-4 py-1 ml-6 bg-red-500 hover:bg-red-700 text-lg text-white">
            </p>
        </form>
</div>
@endsection