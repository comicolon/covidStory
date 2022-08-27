@extends('layouts.app')
@section('content')

    <div class="">
        <div class="flex">
            <h4 class="font-bold p-3 flex-grow">코로나 뉴스</h4>
            @auth
                @if(Auth::user()->grade >=10)
                <a href="{{route('covidNewsCreate')}}" class="flex items-center">
                <button class="bg-green-400 hover:bg-green-500 px-4 py-2 mr-2 float-right
                            text-white rounded-md">글쓰기</button>
                </a>
                @endif
            @endauth
        </div>
        <div class="covid_news_index_header">
            <span class="covid_news_index_header_id">번호</span>
            <span class="covid_news_index_header_title">제목</span>
            <span class="covid_news_index_header_datetime">작성일</span>
        </div>

        @foreach ($covidNews as $news)
            <a href="/covidNews/{{$news->id}}">
                <div class="flex">
                    <span class="covid_news_index_item_id">{{$news->id}}</span>
                    <span class="covid_news_index_item_title"> {{$news->title}}</span>
                    <span class="covid_news_index_item_datetime"> {{$news->created_at->format('Y-m-d')}}</span>
                </div>
            </a>
        @endforeach

        <div>
            {{ $covidNews->links() }}
        </div>
    </div>
@endsection
