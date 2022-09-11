<?php
namespace App\Service;

class baseConfig
{

    const postViewCount = 20;               // 한페이지당 보여줄 글 갯수
    const pageViewCount = 10;               // 한페이지당 보여줄 페이지 목록 갯수

    const defaultPassword = 'costory#487';  // 소셜 회원가입시 디폴트로 설정될 패스워드

    //베스트 점수
    const pointPerView = 1;                 // 1조회수당 점수
    const pointPerComment = 5;              // 1댓글당 점수
    const viewCoeffi = 0.635;               // 조회수 증가에 따른 점수 계수
    const commentCoeffi = 0.805;            // 댓글 증가에 따른 점수 계수
    //사이트당 가중치 점수 평균 40000에 맞춤
    const coeffi_bbdream = 5.053342937;
    const coeffi_clien = 2.337513587;
    const coeffi_dcinside = 1.974541024;
    const coeffi_fmkorea = 0.3088577;
    const coeffi_huniv = 1;
    const coeffi_instiz = 1.400360826;
    const coeffi_inven = 0.482877038;
    const coeffi_natepann = 4.898599001;
    const coeffi_ppomppu = 2.357625294;
    const coeffi_ruliweb = 0.406677348;
    const coeffi_slrclub = 11.80992894;
    const coeffi_theqoo = 0.62999411;
}
