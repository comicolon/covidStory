import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(".parent_menu").click(function() {
    $(this).next(".submenu").stop().slideToggle(300);
    $(this).toggleClass('on').siblings().removeClass('on');
    $(this).next(".submenu").siblings(".submenu").slideUp(300); // 1개씩 펼치기
});
