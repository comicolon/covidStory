import './bootstrap';

import Alpine from 'alpinejs';
import {trim} from "lodash/string";

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

// 지역 바꾸기
$('#localArea').change(function (){
    var area = $('#localArea').val();
    location.replace('/covidInfo'+'?area='+area + '#localArea');
});

//오토링크 // 출처를 오토 링크 시켜줌
$.each($('p'), function(idx, tg) {
    $(this).html($(this).html().autoLink({ target: "_blank" }));
});

// 작성시간이 오늘인지 이전 시간인지 바꿔 줌
if ($('.write_time')){
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth()+1;
    if (month < 10){
        month = "0" + month;
    }
    var date = now.getDate();
    var nowDate = trim (year + '/' + month + '/' + date);
}
$.each($('.write_time'), function (index, value) {
    var dateTime = $(value).text();
    var date = trim( dateTime.split('?')[0]);
    var time = trim( dateTime.split('?')[1]);
    if (date === nowDate){
        $(value).text(time);
    }
    else if (date !== nowDate){
        $(value).text(date);
    }
})


