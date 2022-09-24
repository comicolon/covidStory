<div class="w-full">
    <div>
        <h4 class="font-bold p-3 flex-grow">핫 딜</h4>
    </div>
    {{--  카테고리 분류  --}}
    <div class="px-1">
        <div class="inline-block px-2 mb-2 bg-siteTheme3 text-white rounded-sm">
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="full" wire:click="setCategory('full')">전체</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="etc" wire:click="setCategory('etc')">기타</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="clien" wire:click="setCategory('clien')">클리앙</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
               <a href="#" id="dgtsw" wire:click="setCategory('dgtsw')">디지털SW</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
               <a href="#" id="pchafn" wire:click="setCategory('pchafn')">PC/가전/가구</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="fdlf" wire:click="setCategory('fdlf')">식품/생활</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
               <a href="#" id="cos" wire:click="setCategory('cos')">화장품</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="clo" wire:click="setCategory('clo')">의류/잡화</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="prt" wire:click="setCategory('prt')">육아</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="gccp" wire:click="setCategory('gccp')">상품권/쿠폰/이벤트</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="book" wire:click="setCategory('book')">서적</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="hv" wire:click="setCategory('hv')">취미/레저</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="cell" wire:click="setCategory('cell')">휴대폰</a>
            </span>
            <span class="px-1 hover:text-siteThemeCpm2">
                <a href="#" id="osea" wire:click="setCategory('osea')">해외</a>
            </span>
        </div>
    </div>
    {{--  안내문  --}}
    <div class="px-2 py-2 text-sm text-siteTheme1">
        <p>'기타'로 분류된 것 속에는 여러가지 핫딜이 있을 수 있습니다.</p>
        <p>클리앙은 따로 분류되었습니다.</p>
    </div>
    {{--  리스트 시작  --}}
    <div class="px-1">
        <ul>
            @foreach($deals as $deal)
                <li class="py-2 border-b rounded-br-3xl shadow-sm shadow-siteTheme5">
                    <a href="{{$deal->url}}">
                        <p class="w-96 truncate md:w-full">{!! $deal->title !!}</p>
                    </a>
                    <div class="flex">
                        <p class="text-tiny bg-siteTheme4 text-siteTheme2">{{$deal->category}}</p>
                        <p class="px-2 text-tiny text-gray-500">{{$deal->site_name}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>


    <div class="py-3">
        {{ $deals->links() }}
    </div>
    <di>

    </di>


</div>

