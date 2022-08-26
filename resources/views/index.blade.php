@extends('layouts.app')
@section('content')

    <div class="md:flex">
        <div class="flex-1 order-1">
            <div class="bg-indigo-900 text-xl text-white flex items-center h-12">
                <p class="ml-4"> 국내 코로나 발생 현황 </p>
            </div>
            <div class="max-h-36 bg-amber-400 text-white px-3">
                <p class="text-xl">국내 확진자 수</p>
                <p class="text-4xl">{{number_format($json['korea']['totalCnt'])}}</p>
            </div>
            <div class="h-8 px-3 bg-gray-300 flex items-center">
                <P class="text-green-800-500">{{ mb_substr($json['API']['updateTime'],23, 13, 'utf8')}}</P>
            </div>
            <div class="max-h-36 bg-amber-500 px-3 text-white">
                <p class="text-xl">전일대비 확진자 수</p>
                <p class="text-4xl">{{number_format($json['korea']['incDec'])}}</p>
            </div>

            <div class="flex bg-gray-200">
                <div class="my-2 flex flex-grow justify-center">
                    <a href="/covidInfo">
                        <input type="button" value="자세히 보기" class="button_home_detail">
                    </a>
                </div>
                <div class="my-2 flex flex-grow justify-center">
                    <a href="/covidInfo#localArea">
                        <input type="button" value="지역정보 보기" class="button_home_detail">
                    </a>
                </div>
            </div>
        </div>
        {{--   뉴스 게시판  일상 게시판    --}}
        <div class="flex-1 order-2 flex-row bg-emerald-50">

            <div>
                <div class="border-b-2 border-indigo-400 px-3 py-1 bg-emerald-400 text-white">
                    <h3>뉴스</h3>
                </div>
                <div class="pl-4">
                        <UL>
                            @foreach($covidNews as $news)
                            <li>
                                <a href="/covidNews/{{$news->id}}">
                                <ul>{{$news->title}}</ul>
                                </a>
                            </li>
                            @endforeach
                        </UL>
                </div>
            </div>

            <div>
                <div class="border-b-2 border-indigo-400 px-3 py-1 bg-emerald-400 text-white">
                    <h3>일상 이야기</h3>
                </div>
                <div class="pl-4">
                    <UL>
                        @foreach($lifeStory as $story)
                            <li>
                                <a href="/lifeStory/{{$story->id}}">
                                    <ul>{{$story->title}}</ul>
                                </a>
                            </li>
                        @endforeach
                    </UL>
                </div>
            </div>

        </div>


    </div>


@endsection

