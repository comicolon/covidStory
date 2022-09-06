@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="flex">
            <h4 class="font-bold p-3 flex-grow">베스트 모아</h4>

        </div>
        <div class="">
            <div>
                헤더입니다.
            </div>
        </div>
        <ul>
            @foreach($totalListNormal as $item)
            @endforeach
        </ul>


   </div>



@endsection
