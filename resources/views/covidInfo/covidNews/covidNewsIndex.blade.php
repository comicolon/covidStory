@extends('layouts.app')
@section('content')
    
<div class="flex-grow">
    <div class="mx-auto my-auto px-8 py-4">
        <div class="flex">
            <h1 class="font-bold text-3xl p-3 flex-1">코로나 뉴스</h1>
            <a href="/covidNews/create" class="flex items-center">
            <button class="bg-green-400 hover:bg-green-600 px-4 py-2 float-right
                         text-white rounded-md">글쓰기</button>
            </a>
        </div>
        <ul>
            @foreach ($covidNews as $news)
                <a href="/covidNews/{{$news->id}}"
                    <li class="block border-b p-3 m-3"> {{$news->title}} 
                        <small class="float-right"> {{$news->created_at->format('Y-m-d')}}</small></li><br>
                </a>
            @endforeach
        </ul>
    </div>
</div>
@endsection