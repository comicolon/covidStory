<div>
    <div class="px-3 py-1 bg-siteTheme3 text-white rounded-br-2xl">
        <p>날씨</p>
    </div>
    <div class="flex justify-center">
            <p class="text-gray-400 px-2">현재</p> <p>{{$wcArr[7]}}</p>
    </div>
    <div class="flex justify-center items-center">
            <img src="{{$wcArr[5]}}" alt=""/>
            <p>{{round($wcArr[0])}}º</p>
            <p>{{$wcArr[4]}}</p>
    </div>

    <div class="flex justify-center mb-1">
        <label>
            <select class="rounded-md py-1 my-1" wire:model="city" name="city">
                <option value="Seoul">서울</option>
                <option value="Busan">부산</option>
                <option value="Daejeon">대전</option>
                <option value="Daegu">대구</option>
                <option value="Kwangju">광주</option>
                <option value="Incheon">인천</option>
                <option value="Suwon">수원</option>
                <option value="Changwon">창원</option>
                <option value="Ulsan">울산</option>
                <option value="Andong">안동</option>
                <option value="Chuncheon">춘천</option>
                <option value="Cheongju">청주</option>
                <option value="Jeonju">전주</option>
                <option value="Jeju">제주</option>
            </select>
        </label>
    </div>

    <div class="flex">
        @foreach($waArr as $wa)
        <div class="">
            <p class="text-sm">{{substr($wa[6], 8, 2)}}일</p>
            <p class="text-sm">{{substr($wa[6], 11, 2)}}시</p>
            <img src="{{$wa[5]}}" alt=""/>
            {{$wa[4]}}
            {{$wa[0]}}
        </div>
        @endforeach
    </div>




</div>
