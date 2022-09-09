@extends('layouts.app')
@section('content')

    <div class="main_page_content">
        <div class="main_order1">
            <div class="bg-indigo-200 text-gray-800 flex items-center h-10">
                <p class="ml-4"> 국내 코로나 발생 현황 </p>
            </div>
            <div class="max-h-36 bg-amber-100 text-gray-800 px-3">
                <p class="text-xl">국내 확진자 수</p>
                <p class="text-5xl">{{number_format($json['korea']['totalCnt'])}}</p>
            </div>
            <div class="h-8 px-3 bg-zinc-50 flex items-center">
                <P class="text-green-800-500">{{ mb_substr($json['API']['updateTime'],23, 13, 'utf8')}}</P>
            </div>
            <div class="flex bg-amber-200 px-3 text-gray-800">
                <div class="mt-4">
                    <p class="text-2xl">전일대비 확진자 수</p>
                    <p class="text-5xl">{{number_format($json['korea']['incDec'])}}</p>
                </div>
                <div class="flex-grow text-gray-800">
                    <p class="flex justify-center text-2xl">전일 보다</p>
                    <p class="flex justify-center text-4xl">{{number_format(abs($diffinDec))}}</p>
                    @if($diffinDec < 0)
                        <p class="flex justify-center text-3xl">감소⬇</p>
                    @elseif($diffinDec > 0)
                        <p class="flex justify-center text-3xl">증가⬆</p>
                    @elseif($diffinDec == 0)
                        <p class="flex justify-center text-3xl">변화없음⏸</p>
                    @endif
                </div>
            </div>



            <div class="flex bg-zinc-50">
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
        <div class="main_order2">

            <div>
                <div class="px-3 py-1 bg-siteTheme3 text-white">
                    <a href="{{'/covidNews'}}">
                        <h3>뉴스</h3>
                    </a>
                </div>
                <div class="pl-4">
                        <UL class="">
                            @foreach($covidNews as $news)
                            <a class="" href="/covidNews/{{$news->id}}">
                                <li class="main_news_index">{{$news->title}}</li>
                            </a>
                            @endforeach
                        </UL>
                </div>
            </div>

            <div>
                <div class="px-3 py-1 bg-siteTheme3 text-white">
                    <a href="{{'/lifeStory'}}">
                        <h3>일상 이야기</h3>
                    </a>
                </div>
                <div class="pl-4">
                    <UL>
                        @foreach($lifeStory as $story)
                        <a class="" href="/lifeStory/{{$story->id}}">
                            <li class="main_story_index">{{$story->title}}</li>
                        </a>
                        @endforeach
                    </UL>
                </div>
            </div>

        </div>


    </div>


@endsection

