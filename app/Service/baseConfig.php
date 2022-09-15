<?php
namespace App\Service;

class baseConfig
{

    const postViewCount = 20;               // 한페이지당 보여줄 글 갯수
    const pageViewCount = 10;               // 한페이지당 보여줄 페이지 목록 갯수

    const defaultPassword = 'costory#487';  // 소셜 회원가입시 디폴트로 설정될 패스워드

    //나우 베스트
    const bestLimitCount = 30;              // 사이트별 베스트 제한 갯수

    //베스트 점수
    const pointPerView = 1;                 // 1조회수당 점수
    const pointPerComment = 5;              // 1댓글당 점수
    const viewCoeffi = 0.635;               // 조회수 증가에 따른 점수 계수
    const commentCoeffi = 0.805;            // 댓글 증가에 따른 점수 계수
    //사이트당 가중치 점수 평균 25000에 맞춤
    const coeffi_bbdream = 2.747296774;
    const coeffi_clien = 1.493375387;
    const coeffi_dcinside = 1.462285464;
    const coeffi_etoland = 15.57316;
    const coeffi_fmkorea = 0.90740808;
    const coeffi_huniv = 1;
    const coeffi_instiz = 2.291654254;
    const coeffi_inven = 15.39777588;
    const coeffi_natepann = 1.380834024;
    const coeffi_ppomppu = 3.088969379;
    const coeffi_ruliweb = 3.375851359;
    const coeffi_slrclub = 10.28393454;
    const coeffi_theqoo = 0.937966448;
}
