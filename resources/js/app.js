import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//모바일용 햄버거 메뉴 아코디언
$(".parent_menu").click(function() {
    $(this).next(".submenu").stop().slideToggle(300);
    $(this).toggleClass('on').siblings().removeClass('on');
    $(this).next(".submenu").siblings(".submenu").slideUp(300); // 1개씩 펼치기
});

// 코로나 지역 선택
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

var $area = getParameterByName('area');
if ($area != null){
    $('#localArea').val($area).prop('selected', true);
}


$('#localArea').change(function (){
    var area = $('#localArea').val();
    location.replace('/covidInfo'+'?area='+area);
});

