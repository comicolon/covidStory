<?php

namespace App\Console\Commands;

use App\Models\CovidHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MakeCovidHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covidInfo:stackHistory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('코로나 히스토리 쌓기 실행');
        // 코로나 api 가져오기
        $key = 'jPabJtf8zIFvgs6pR7TqV9UEQ4xyZHlDc';

        if (!empty($key)) {
            $existKey = true;
        } else {
            $existKey = false;
        }

        if ($existKey) {
            $data = @file_get_contents('https://api.corona-19.kr/korea/beta/?serviceKey='. $key);
            $json = json_decode($data, true);
        }

        //현재시간
        $dt = Carbon::now()->timezone('Asia/Seoul');

        //api 기준시간
        $rough = mb_substr($json['API']['updateTime'],23, 9, 'utf8');
        $apiMonth = mb_substr($rough, 0,2,'utf8');
        $apiDay = mb_substr($rough, 3,2,'utf8');
        $nowYear = $dt->format('Y');

        $apiDate = $nowYear.'-'.$apiMonth.'-'.$apiDay.' 00:00:00';
        $apiDateDatetime = date_create_from_format('Y-m-d H:i:s', $apiDate);

        //디비에 저장되어있는 최신의 것과 비교해서 같은 날짜면 넘김
        $latestDay = CovidHistory::where('counting_date', $apiDateDatetime)->first();
        if ($latestDay != null){
            Log::info('같은 날짜가 이미 저장되어 있습니다.');
            return 0;
        }


        // 디비에 저장 하기
        $dayStatistics = new CovidHistory();

        $dayStatistics->counting_date = $apiDate;
        $dayStatistics->korea_totalCnt = $json['korea']['totalCnt'];
        $dayStatistics->korea_recCnt = $json['korea']['recCnt'];
        $dayStatistics->korea_deathCnt = $json['korea']['deathCnt'];
        $dayStatistics->korea_isolCnt = $json['korea']['isolCnt'];
        $dayStatistics->korea_qurRate = $json['korea']['qurRate'];
        $dayStatistics->korea_incDec = $json['korea']['incDec'];
        $dayStatistics->korea_incDecK = $json['korea']['incDecK'];
        $dayStatistics->korea_incDecF = $json['korea']['incDecF'];
//
        $dayStatistics->seoul_totalCnt      = $json['seoul']['totalCnt'];
        $dayStatistics->seoul_recCnt        = $json['seoul']['recCnt'];
        $dayStatistics->seoul_deathCnt      = $json['seoul']['deathCnt'];
        $dayStatistics->seoul_isolCnt       = $json['seoul']['isolCnt'];
        $dayStatistics->seoul_qurRate       = $json['seoul']['qurRate'];
        $dayStatistics->seoul_incDec        = $json['seoul']['incDec'];
        $dayStatistics->seoul_incDecK       = $json['seoul']['incDecK'];
        $dayStatistics->seoul_incDecF       = $json['seoul']['incDecF'];
//
        $dayStatistics->busan_totalCnt      = $json['busan']['totalCnt'];
        $dayStatistics->busan_recCnt        = $json['busan']['recCnt'];
        $dayStatistics->busan_deathCnt      = $json['busan']['deathCnt'];
        $dayStatistics->busan_isolCnt       = $json['busan']['isolCnt'];
        $dayStatistics->busan_qurRate       = $json['busan']['qurRate'];
        $dayStatistics->busan_incDec        = $json['busan']['incDec'];
        $dayStatistics->busan_incDecK       = $json['busan']['incDecK'];
        $dayStatistics->busan_incDecF       = $json['busan']['incDecF'];
//
        $dayStatistics->daegu_totalCnt      = $json['daegu']['totalCnt'];
        $dayStatistics->daegu_recCnt        = $json['daegu']['recCnt'];
        $dayStatistics->daegu_deathCnt      = $json['daegu']['deathCnt'];
        $dayStatistics->daegu_isolCnt       = $json['daegu']['isolCnt'];
        $dayStatistics->daegu_qurRate       = $json['daegu']['qurRate'];
        $dayStatistics->daegu_incDec        = $json['daegu']['incDec'];
        $dayStatistics->daegu_incDecK       = $json['daegu']['incDecK'];
        $dayStatistics->daegu_incDecF       = $json['daegu']['incDecF'];
//
        $dayStatistics->incheon_totalCnt    = $json['incheon']['totalCnt'];
        $dayStatistics->incheon_recCnt      = $json['incheon']['recCnt'];
        $dayStatistics->incheon_deathCnt    = $json['incheon']['deathCnt'];
        $dayStatistics->incheon_isolCnt     = $json['incheon']['isolCnt'];
        $dayStatistics->incheon_qurRate     = $json['incheon']['qurRate'];
        $dayStatistics->incheon_incDec      = $json['incheon']['incDec'];
        $dayStatistics->incheon_incDecK     = $json['incheon']['incDecK'];
        $dayStatistics->incheon_incDecF     = $json['incheon']['incDecF'];
//
        $dayStatistics->gwangju_totalCnt    = $json['gwangju']['totalCnt'];
        $dayStatistics->gwangju_recCnt      = $json['gwangju']['recCnt'];
        $dayStatistics->gwangju_deathCnt    = $json['gwangju']['deathCnt'];
        $dayStatistics->gwangju_isolCnt     = $json['gwangju']['isolCnt'];
        $dayStatistics->gwangju_qurRate     = $json['gwangju']['qurRate'];
        $dayStatistics->gwangju_incDec      = $json['gwangju']['incDec'];
        $dayStatistics->gwangju_incDecK     = $json['gwangju']['incDecK'];
        $dayStatistics->gwangju_incDecF     = $json['gwangju']['incDecF'];
//
        $dayStatistics->daejeon_totalCnt    = $json['daejeon']['totalCnt'];
        $dayStatistics->daejeon_recCnt      = $json['daejeon']['recCnt'];
        $dayStatistics->daejeon_deathCnt    = $json['daejeon']['deathCnt'];
        $dayStatistics->daejeon_isolCnt     = $json['daejeon']['isolCnt'];
        $dayStatistics->daejeon_qurRate     = $json['daejeon']['qurRate'];
        $dayStatistics->daejeon_incDec      = $json['daejeon']['incDec'];
        $dayStatistics->daejeon_incDecK     = $json['daejeon']['incDecK'];
        $dayStatistics->daejeon_incDecF     = $json['daejeon']['incDecF'];
//
        $dayStatistics->ulsan_totalCnt      = $json['ulsan']['totalCnt'];
        $dayStatistics->ulsan_recCnt        = $json['ulsan']['recCnt'];
        $dayStatistics->ulsan_deathCnt      = $json['ulsan']['deathCnt'];
        $dayStatistics->ulsan_isolCnt       = $json['ulsan']['isolCnt'];
        $dayStatistics->ulsan_qurRate       = $json['ulsan']['qurRate'];
        $dayStatistics->ulsan_incDec        = $json['ulsan']['incDec'];
        $dayStatistics->ulsan_incDecK       = $json['ulsan']['incDecK'];
        $dayStatistics->ulsan_incDecF       = $json['ulsan']['incDecF'];
//
        $dayStatistics->sejong_totalCnt     = $json['sejong']['totalCnt'];
        $dayStatistics->sejong_recCnt       = $json['sejong']['recCnt'];
        $dayStatistics->sejong_deathCnt     = $json['sejong']['deathCnt'];
        $dayStatistics->sejong_isolCnt      = $json['sejong']['isolCnt'];
        $dayStatistics->sejong_qurRate      = $json['sejong']['qurRate'];
        $dayStatistics->sejong_incDec       = $json['sejong']['incDec'];
        $dayStatistics->sejong_incDecK      = $json['sejong']['incDecK'];
        $dayStatistics->sejong_incDecF      = $json['sejong']['incDecF'];
//
        $dayStatistics->gyeonggi_totalCnt    = $json['gyeonggi']['totalCnt'];
        $dayStatistics->gyeonggi_recCnt      = $json['gyeonggi']['recCnt'];
        $dayStatistics->gyeonggi_deathCnt    = $json['gyeonggi']['deathCnt'];
        $dayStatistics->gyeonggi_isolCnt     = $json['gyeonggi']['isolCnt'];
        $dayStatistics->gyeonggi_qurRate     = $json['gyeonggi']['qurRate'];
        $dayStatistics->gyeonggi_incDec      = $json['gyeonggi']['incDec'];
        $dayStatistics->gyeonggi_incDecK     = $json['gyeonggi']['incDecK'];
        $dayStatistics->gyeonggi_incDecF     = $json['gyeonggi']['incDecF'];
//
        $dayStatistics->gangwon_totalCnt     = $json['gangwon']['totalCnt'];
        $dayStatistics->gangwon_recCnt       = $json['gangwon']['recCnt'];
        $dayStatistics->gangwon_deathCnt     = $json['gangwon']['deathCnt'];
        $dayStatistics->gangwon_isolCnt      = $json['gangwon']['isolCnt'];
        $dayStatistics->gangwon_qurRate      = $json['gangwon']['qurRate'];
        $dayStatistics->gangwon_incDec       = $json['gangwon']['incDec'];
        $dayStatistics->gangwon_incDecK      = $json['gangwon']['incDecK'];
        $dayStatistics->gangwon_incDecF      = $json['gangwon']['incDecF'];
//
        $dayStatistics->chungbuk_totalCnt     = $json['chungbuk']['totalCnt'];
        $dayStatistics->chungbuk_recCnt       = $json['chungbuk']['recCnt'];
        $dayStatistics->chungbuk_deathCnt     = $json['chungbuk']['deathCnt'];
        $dayStatistics->chungbuk_isolCnt      = $json['chungbuk']['isolCnt'];
        $dayStatistics->chungbuk_qurRate      = $json['chungbuk']['qurRate'];
        $dayStatistics->chungbuk_incDec       = $json['chungbuk']['incDec'];
        $dayStatistics->chungbuk_incDecK      = $json['chungbuk']['incDecK'];
        $dayStatistics->chungbuk_incDecF      = $json['chungbuk']['incDecF'];
//
        $dayStatistics->chungnam_totalCnt      = $json['chungnam']['totalCnt'];
        $dayStatistics->chungnam_recCnt        = $json['chungnam']['recCnt'];
        $dayStatistics->chungnam_deathCnt      = $json['chungnam']['deathCnt'];
        $dayStatistics->chungnam_isolCnt       = $json['chungnam']['isolCnt'];
        $dayStatistics->chungnam_qurRate       = $json['chungnam']['qurRate'];
        $dayStatistics->chungnam_incDec        = $json['chungnam']['incDec'];
        $dayStatistics->chungnam_incDecK       = $json['chungnam']['incDecK'];
        $dayStatistics->chungnam_incDecF       = $json['chungnam']['incDecF'];
//
        $dayStatistics->jeonbuk_totalCnt     = $json['jeonbuk']['totalCnt'];
        $dayStatistics->jeonbuk_recCnt       = $json['jeonbuk']['recCnt'];
        $dayStatistics->jeonbuk_deathCnt     = $json['jeonbuk']['deathCnt'];
        $dayStatistics->jeonbuk_isolCnt      = $json['jeonbuk']['isolCnt'];
        $dayStatistics->jeonbuk_qurRate      = $json['jeonbuk']['qurRate'];
        $dayStatistics->jeonbuk_incDec       = $json['jeonbuk']['incDec'];
        $dayStatistics->jeonbuk_incDecK      = $json['jeonbuk']['incDecK'];
        $dayStatistics->jeonbuk_incDecF      = $json['jeonbuk']['incDecF'];
//
        $dayStatistics->jeonnam_totalCnt     = $json['jeonnam']['totalCnt'];
        $dayStatistics->jeonnam_recCnt       = $json['jeonnam']['recCnt'];
        $dayStatistics->jeonnam_deathCnt     = $json['jeonnam']['deathCnt'];
        $dayStatistics->jeonnam_isolCnt      = $json['jeonnam']['isolCnt'];
        $dayStatistics->jeonnam_qurRate      = $json['jeonnam']['qurRate'];
        $dayStatistics->jeonnam_incDec       = $json['jeonnam']['incDec'];
        $dayStatistics->jeonnam_incDecK      = $json['jeonnam']['incDecK'];
        $dayStatistics->jeonnam_incDecF      = $json['jeonnam']['incDecF'];
//
        $dayStatistics->gyeongbuk_totalCnt    = $json['gyeongbuk']['totalCnt'];
        $dayStatistics->gyeongbuk_recCnt      = $json['gyeongbuk']['recCnt'];
        $dayStatistics->gyeongbuk_deathCnt    = $json['gyeongbuk']['deathCnt'];
        $dayStatistics->gyeongbuk_isolCnt     = $json['gyeongbuk']['isolCnt'];
        $dayStatistics->gyeongbuk_qurRate     = $json['gyeongbuk']['qurRate'];
        $dayStatistics->gyeongbuk_incDec      = $json['gyeongbuk']['incDec'];
        $dayStatistics->gyeongbuk_incDecK     = $json['gyeongbuk']['incDecK'];
        $dayStatistics->gyeongbuk_incDecF     = $json['gyeongbuk']['incDecF'];
//
        $dayStatistics->gyeongnam_totalCnt    = $json['gyeongnam']['totalCnt'];
        $dayStatistics->gyeongnam_recCnt      = $json['gyeongnam']['recCnt'];
        $dayStatistics->gyeongnam_deathCnt    = $json['gyeongnam']['deathCnt'];
        $dayStatistics->gyeongnam_isolCnt     = $json['gyeongnam']['isolCnt'];
        $dayStatistics->gyeongnam_qurRate     = $json['gyeongnam']['qurRate'];
        $dayStatistics->gyeongnam_incDec      = $json['gyeongnam']['incDec'];
        $dayStatistics->gyeongnam_incDecK     = $json['gyeongnam']['incDecK'];
        $dayStatistics->gyeongnam_incDecF     = $json['gyeongnam']['incDecF'];
//
        $dayStatistics->jeju_totalCnt        = $json['jeju']['totalCnt'];
        $dayStatistics->jeju_recCnt          = $json['jeju']['recCnt'];
        $dayStatistics->jeju_deathCnt        = $json['jeju']['deathCnt'];
        $dayStatistics->jeju_isolCnt         = $json['jeju']['isolCnt'];
        $dayStatistics->jeju_qurRate         = $json['jeju']['qurRate'];
        $dayStatistics->jeju_incDec          = $json['jeju']['incDec'];
        $dayStatistics->jeju_incDecK         = $json['jeju']['incDecK'];
        $dayStatistics->jeju_incDecF         = $json['jeju']['incDecF'];

        $dayStatistics->save();

        return 0;
    }
}
