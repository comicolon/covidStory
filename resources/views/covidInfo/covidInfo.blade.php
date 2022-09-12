@extends('layouts.app')
@section('title', '코로나 정보')
@section('content')

<div class="w-full md:flex">
    <div class="flex-1 order-1">
        <div class="bg-indigo-200 text-base flex items-center h-10">
            <p class="ml-4"> 국내 코로나 발생 현황 </p>
        </div>
        <div class="max-h-36 bg-amber-100 text-gray-800 px-3">
                <p class="text-xl">국내 확진자 수</p>
                <p class="text-5xl">{{number_format($json['korea']['totalCnt'])}}</p>
        </div>
        <div class="h-8 px-3 bg-gray-300 flex items-center">
            <P class="text-green-800-500">{{ mb_substr($json['API']['updateTime'],23, 13, 'utf8')}}</P>
        </div>
        <div class="h-36 flex bg-amber-200 px-3 text-gray-800">
            <div>
                <p class="text-xl">전일대비 확진자 수</p>
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
        <div class="h-24 bg-emerald-200 px-3 text-gray-800">
            <p class="text-xl">국내 완치자 수</p>
            <p class="text-4xl">{{number_format($json['korea']['recCnt'])}}</p>
        </div>
        <div class="h-24 bg-gray-700 px-3 text-white">
            <p class="text-xl">국내 사망자 수</p>
            <p class="text-4xl">{{number_format($json['korea']['deathCnt'])}}</p>
        </div>
        <div class="h-20 bg-emerald-300 px-3">
            <p class="text-xl">국내 치료중 환자 수</p>
            <p class="text-3xl">{{number_format($json['korea']['isolCnt'])}}</p>
        </div>
        <div class="h-20 bg-indigo-200 px-3 text-gray-800">
            <p class="text-xl">국내 코로나 발생률</p>
            <p class="text-3xl">{{ number_format($json['korea']['qurRate']/1000,3).'%'}}</p>
        </div>
    </div>

    <div class="flex-1 order-2 flex-row bg-emerald-50">
        <div class="h-24 flex items-center justify-center">

            <label for="localArea" class="text-xl">지역 선택
                <select name="localArea" id="localArea" class="border-none shadow-lg rounded-lg bg-amber-50">
                    <option value="seoul" class="text-xl">서울</option>
                    <option value="busan" class="text-xl">부산</option>
                    <option value="daegu" class="text-xl">대구</option>
                    <option value="incheon" class="text-xl">인천</option>
                    <option value="gwangju" class="text-xl">광주</option>
                    <option value="daejeon" class="text-xl">대전</option>
                    <option value="ulsan" class="text-xl">울산</option>
                    <option value="sejong" class="text-xl">세종</option>
                    <option value="gyeonggi" class="text-xl">경기</option>
                    <option value="gangwon" class="text-xl">강원</option>
                    <option value="chungbuk" class="text-xl">충북</option>
                    <option value="chungnam" class="text-xl">충남</option>
                    <option value="jeonbuk" class="text-xl">전북</option>
                    <option value="jeonnam" class="text-xl">전남</option>
                    <option value="gyeongbuk" class="text-xl">경북</option>
                    <option value="gyeongnam" class="text-xl">경남</option>
                    <option value="jeju" class="text-xl">제주</option>
                </select>
            </label>
        </div>
        <div class="h-full">
            <div class="h-4/5 flex-row bg-gradient-to-b from-white to-stone-200
                    flex-row justify-center items-center">
                <div class="flex items-center justify-center px-3 py-3 bg-blue-300">
                    <p class="text-2xl text-green-900">{{$json[$area]['countryNm']}}</p>
                </div>
                <div class="flex items-center justify-center">
                    <div>
                        <p class="text-xl flex justify-center">확진자 수</p>
                        <p class="text-4xl flex justify-center">{{number_format($json[$area]['totalCnt'])}}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center bg-rose-100">
                    <div class="p-1">
                        <p class="text-xl flex justify-center">전일대비 확진자 수</p>
                        <p class="text-4xl flex justify-center">{{number_format($json[$area]['incDec'])}}</p>
                    </div>
                    <div class="ml-2 text-gray-800 flex-grow">
                        <p class="flex text-2xl justify-center">전일 보다</p>
                        <p class="flex text-4xl justify-center">{{number_format(abs($diffincDecArea))}}</p>
                        @if($diffincDecArea < 0)
                            <p class="flex text-3xl justify-center">감소⬇</p>
                        @elseif($diffincDecArea > 0)
                            <p class="flex text-3xl justify-center">증가⬆</p>
                        @elseif($diffincDecArea == 0)
                            <p class="flex text-3xl justify-center">변화없음⏸</p>
                        @endif
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div>
                        <p class="text-xl flex justify-center">완치자 수</p>
                        <p class="text-3xl flex justify-center">{{number_format($json[$area]['recCnt'])}}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div>
                        <p class="text-xl flex justify-center">사망자 수</p>
                        <p class="text-3xl flex justify-center">{{number_format($json[$area]['deathCnt'])}}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div>
                        <p class="text-xl flex justify-center">치료중 환자 수</p>
                        <p class="text-3xl flex justify-center">{{number_format($json[$area]['isolCnt'])}}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div>
                        <p class="text-xl flex justify-center">코로나 발생률</p>
                        <p class="text-3xl flex justify-center">{{ number_format($json[$area]['qurRate']/1000,3).'%'}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>


@endsection

