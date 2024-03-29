@extends('layouts.app')
@section('title', '코로나 뉴스 보기')
@section('content')
    <section class="py-2 w-full md:px-2">

        <div class="border-b border-gray-300 mb-8 pl-1 pb-2 text-xl font-bold">
            {{$covidNews -> title}}
        </div>
        <div class="mb-8 pl-1 pb-2">
            <p class="text-gray-500 text-sm w-64 truncate">출처 : {{$covidNews -> source}}</p>
        </div>
        <div class="text-lg">
            {!! $covidNews-> content !!}
        </div>
        <div class="mt-8">
            <a href="{{route('covidNews')}}">
                <button class="px-4 py-1 text-white text-lg bg-blue-300 hover:bg-blue-700">목록</button>
            </a>
            @auth
            @if(Auth::user()->grade >= 10)
                <a href="{{route('covidNewsEdit', $covidNews -> id)}}">
                    <button class="px-4 py-1 text-white text-lg bg-blue-500 hover:bg-blue-700">수정</button>
                </a>
                <form action="/covidNews/{{$covidNews -> id}}" method="post" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-1 text-white text-lg bg-red-500 hover:bg-red-700">삭제</button>
                </form>
            @endif
            @endauth
        </div>
    </section>
@endsection
