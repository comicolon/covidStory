@extends('layouts.app')
@section('content')

    <div class=" md:flex">
        <div class="flex-1 order-1">
            <div class="bg-indigo-900 text-2xl text-white flex items-center h-12">
                <p class="ml-4"> 국내 코로나 발생 현황 </p>
            </div>
            <div class="max-h-36 bg-amber-400 text-white px-3">
                <p class="text-2xl">국내 확진자 수</p>
                <p class="text-6xl">{{number_format($json['korea']['totalCnt'])}}</p>
            </div>
            <div class="h-8 px-3 bg-gray-300 flex items-center">
                <P class="text-green-800-500">{{ mb_substr($json['API']['updateTime'],23, 13, 'utf8')}}</P>
            </div>
            <div class="h-36 bg-amber-500 px-3 text-white">
                <p class="text-2xl">전일대비 확진자 수</p>
                <p class="text-6xl">{{number_format($json['korea']['incDec'])}}</p>
            </div>
            <div class="h-24 bg-emerald-500 px-3 text-white">
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
            <div class="h-20 bg-blue-800 px-3 text-white">
                <p class="text-xl">국내 코로나 발생률</p>
                <p class="text-3xl">{{ number_format($json['korea']['qurRate']).'%'}}</p>
            </div>
        </div>

        <div class="flex-1 order-2 flex-row bg-emerald-50">
            <div class="my-2 flex justify-center">
                <a href="/covidInfo#localArea">
                    <input type="button" value="지역정보 보기" class="px-4 py-1 bg-green-500 hover:bg-green-700 text-lg text-white">
                </a>
            </div>

        </div>


    </div>


@endsection

