@extends('layouts.app')
@section('content')

<div class="flex-grow">
    <div class="mx-auto my-auto px-auto py-auto">
        <div class="flex">
            <h4 class="font-bold p-3 flex-0">코로나 뉴스</h4>
            @auth
                @if(Auth::user()->grade >=10)
                <a href="{{route('covidNewsCreate')}}" class="flex items-center">
                <button class="bg-green-400 hover:bg-green-500 px-4 py-2 float-right
                             text-white rounded-md">글쓰기</button>
                </a>
                @endif
            @endauth
        </div>
        <ul>
            @foreach ($covidNews as $news)
                <a href="/covidNews/{{$news->id}}">
                    <li class="block border-b m-3"> {{$news->title}}
                        <small class="float-right"> {{$news->created_at->format('Y-m-d')}}</small></li>
                </a>
            @endforeach
        </ul>
    </div>
</div>
@endsection
