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
    //사이트당 가중치
}
