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
    if (date < 10){
        date = '0' + date;
    }
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

// 베스트 모아에서 사이트에 따라서 말머리 색상을 바꿔 줌
$.each($('.rating_site'), function (index, value) {

    var site_name = $(value).find($('.site_name')).text();

    if (site_name === '보배'){
        $(value).css('background-color', '#5486c6');
    }
    else if (site_name === '클량'){
        $(value).css('background-color', '#3e487e');
    }
    else if (site_name ==='디씨'){
        $(value).css('background-color', '#3e488d');
    }
    else if (site_name ==='펨코'){
        $(value).css('background-color', '#5775ca');
    }
    else if (site_name ==='웃대'){
        $(value).css('background-color', '#da3e4c');
    }
    else if (site_name ==='인티'){
        $(value).css('background-color', '#5cbb65');
    }
    else if (site_name ==='인벤'){
        $(value).css('background-color', '#90c34f');
    }
    else if (site_name ==='넷판'){
        $(value).css('background-color', '#dd5241');
    }
    else if (site_name ==='뽐뿌'){
        $(value).css('background-color', '#a4a4a4');
    }
    else if (site_name ==='루리'){
        $(value).css('background-color', '#2860b2');
    }
    else if (site_name ==='에세랄'){
        $(value).css('background-color', '#588bda');
    }
    else if (site_name ==='더쿠'){
        $(value).css('background-color', '#3e5370');
    }
})

// 베스트 모아 리스트 아이템 클릭시 함수 연결
$(".best_list_item").on("click", function () {

    var num = $(this).attr("num");
    var site_name = $(this).attr('site_name');

    location.href = '/bestListClick?num='+num+'&site_name='+site_name;
});




