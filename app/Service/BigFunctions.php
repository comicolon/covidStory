<?php
namespace App\Service;

use App\Models\CovidHistory;
use Psy\Util\Json;

class BigFunctions
{
    public function changeInfoToJson (CovidHistory $history){
        //1차 배열 요소
        $apiArr =
            array
            (
                "updateTime" => $history->counting_date,
            );
        $koreaArr =
            array
            (
                'totalCnt'  => $history->korea_totalCnt,
                'incDec'    => $history->korea_incDec,
                'recCnt'    => $history->korea_recCnt,
                'deathCnt'  => $history->korea_deathCnt,
                'isolCnt'   => $history->korea_isolCnt,
                'qurRate'   => $history->korea_qurRate
            );

        $seoulArr =
            array
            (
                 'totalCnt'  => $history->seoul_totalCnt,
                 'incDec'    => $history->seoul_incDec,
                 'recCnt'    => $history->seoul_recCnt,
                 'deathCnt'  => $history->seoul_deathCnt,
                 'isolCnt'   => $history->seoul_isolCnt,
                 'qurRate'   => $history->seoul_qurRate
            );

        $busanArr =
            array
            (
                 'totalCnt'  => $history->busan_totalCnt,
                 'incDec'    => $history->busan_incDec,
                 'recCnt'    => $history->busan_recCnt,
                 'deathCnt'  => $history->busan_deathCnt,
                 'isolCnt'   => $history->busan_isolCnt,
                 'qurRate'   => $history->busan_qurRate
            );

        $daeguArr =
            array
            (
                 'totalCnt'  => $history->daegu_totalCnt,
                 'incDec'    => $history->daegu_incDec,
                 'recCnt'    => $history->daegu_recCnt,
                 'deathCnt'  => $history->daegu_deathCnt,
                 'isolCnt'   => $history->daegu_isolCnt,
                 'qurRate'   => $history->daegu_qurRate
            );

        $incheonArr =
            array
            (
                 'totalCnt'  => $history->incheon_totalCnt,
                 'incDec'    => $history->incheon_incDec,
                 'recCnt'    => $history->incheon_recCnt,
                 'deathCnt'  => $history->incheon_deathCnt,
                 'isolCnt'   => $history->incheon_isolCnt,
                 'qurRate'   => $history->incheon_qurRate
            );

        $gwangjuArr =
            array
            (
                 'totalCnt'  => $history->gwangju_totalCnt,
                 'incDec'    => $history->gwangju_incDec,
                 'recCnt'    => $history->gwangju_recCnt,
                 'deathCnt'  => $history->gwangju_deathCnt,
                 'isolCnt'   => $history->gwangju_isolCnt,
                 'qurRate'   => $history->gwangju_qurRate
            );

        $daejeonArr =
            array
            (
                 'totalCnt'  => $history->daejeon_totalCnt,
                 'incDec'    => $history->daejeon_incDec,
                 'recCnt'    => $history->daejeon_recCnt,
                 'deathCnt'  => $history->daejeon_deathCnt,
                 'isolCnt'   => $history->daejeon_isolCnt,
                 'qurRate'   => $history->daejeon_qurRate
            );

        $ulsanArr =
            array
            (
                 'totalCnt'  => $history->ulsan_totalCnt,
                 'incDec'    => $history->ulsan_incDec,
                 'recCnt'    => $history->ulsan_recCnt,
                 'deathCnt'  => $history->ulsan_deathCnt,
                 'isolCnt'   => $history->ulsan_isolCnt,
                 'qurRate'   => $history->ulsan_qurRate
            );

        $sejongArr =
            array
            (
                 'totalCnt'  => $history->sejong_totalCnt,
                 'incDec'    => $history->sejong_incDec,
                 'recCnt'    => $history->sejong_recCnt,
                 'deathCnt'  => $history->sejong_deathCnt,
                 'isolCnt'   => $history->sejong_isolCnt,
                 'qurRate'   => $history->sejong_qurRate
            );

        $gyeonggiArr =
            array
            (
                 'totalCnt'  => $history->gyeonggi_totalCnt,
                 'incDec'    => $history->gyeonggi_incDec,
                 'recCnt'    => $history->gyeonggi_recCnt,
                 'deathCnt'  => $history->gyeonggi_deathCnt,
                 'isolCnt'   => $history->gyeonggi_isolCnt,
                 'qurRate'   => $history->gyeonggi_qurRate
            );

        $gangwonArr =
            array
            (
                 'totalCnt'  => $history->gangwon_totalCnt,
                 'incDec'    => $history->gangwon_incDec,
                 'recCnt'    => $history->gangwon_recCnt,
                 'deathCnt'  => $history->gangwon_deathCnt,
                 'isolCnt'   => $history->gangwon_isolCnt,
                 'qurRate'   => $history->gangwon_qurRate
            );

        $chungbukArr =
            array
            (
                 'totalCnt'  => $history->chungbuk_totalCnt,
                 'incDec'    => $history->chungbuk_incDec,
                 'recCnt'    => $history->chungbuk_recCnt,
                 'deathCnt'  => $history->chungbuk_deathCnt,
                 'isolCnt'   => $history->chungbuk_isolCnt,
                 'qurRate'   => $history->chungbuk_qurRate
            );

        $chungnamArr =
            array
            (
                 'totalCnt'  => $history->chungnam_totalCnt,
                 'incDec'    => $history->chungnam_incDec,
                 'recCnt'    => $history->chungnam_recCnt,
                 'deathCnt'  => $history->chungnam_deathCnt,
                 'isolCnt'   => $history->chungnam_isolCnt,
                 'qurRate'   => $history->chungnam_qurRate
            );

        $jeonbukArr =
            array
            (
                 'totalCnt'  => $history->jeonbuk_totalCnt,
                 'incDec'    => $history->jeonbuk_incDec,
                 'recCnt'    => $history->jeonbuk_recCnt,
                 'deathCnt'  => $history->jeonbuk_deathCnt,
                 'isolCnt'   => $history->jeonbuk_isolCnt,
                 'qurRate'   => $history->jeonbuk_qurRate
            );

        $jeonnamArr =
            array
            (
                 'totalCnt'  => $history->jeonnam_totalCnt,
                 'incDec'    => $history->jeonnam_incDec,
                 'recCnt'    => $history->jeonnam_recCnt,
                 'deathCnt'  => $history->jeonnam_deathCnt,
                 'isolCnt'   => $history->jeonnam_isolCnt,
                 'qurRate'   => $history->jeonnam_qurRate
            );

        $gyeongbukArr =
            array
            (
                 'totalCnt'  => $history->gyeongbuk_totalCnt,
                 'incDec'    => $history->gyeongbuk_incDec,
                 'recCnt'    => $history->gyeongbuk_recCnt,
                 'deathCnt'  => $history->gyeongbuk_deathCnt,
                 'isolCnt'   => $history->gyeongbuk_isolCnt,
                 'qurRate'   => $history->gyeongbuk_qurRate
            );

        $gyeongnamArr =
            array
            (
                 'totalCnt'  => $history->gyeongnam_totalCnt,
                 'incDec'    => $history->gyeongnam_incDec,
                 'recCnt'    => $history->gyeongnam_recCnt,
                 'deathCnt'  => $history->gyeongnam_deathCnt,
                 'isolCnt'   => $history->gyeongnam_isolCnt,
                 'qurRate'   => $history->gyeongnam_qurRate
            );

        $jejuArr =
            array
            (
                 'totalCnt'  => $history->jeju_totalCnt,
                 'incDec'    => $history->jeju_incDec,
                 'recCnt'    => $history->jeju_recCnt,
                 'deathCnt'  => $history->jeju_deathCnt,
                 'isolCnt'   => $history->jeju_isolCnt,
                 'qurRate'   => $history->jeju_qurRate
            );


        $arrBefore = array
        (
            'API' => $apiArr,
            'korea' => $koreaArr,
            'busan' => $busanArr,
            'daegu' => $daeguArr,
            'incheon' => $incheonArr,
            'gwangju' => $gwangjuArr,
            'daejeon' => $daejeonArr,
            'ulsan' => $ulsanArr,
            'sejong' => $sejongArr,
            'gyeonggi' => $gyeonggiArr,
            'gangwon' => $gangwonArr,
            'chungbuk' => $chungbukArr,
            'chungnam' => $chungnamArr,
            'jeonbuk' => $jeonbukArr,
            'jeonnam' => $jeonnamArr,
            'gyeongbuk' => $gyeongbukArr,
            'gyeongnam' => $gyeongnamArr,
            'jeju' => $jejuArr,
        );

        return $arrBefore;
    }
}
