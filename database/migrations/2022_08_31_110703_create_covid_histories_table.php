<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_histories', function (Blueprint $table) {
            $table->id();
            $table->dateTime('counting_date')->comment('집계일자');
            $table->integer('korea_totalCnt')->comment('국내 확진자 수');
            $table->integer('korea_recCnt')->comment('국내 완치자 수');
            $table->integer('korea_deathCnt')->comment('국내 사망자 수');
            $table->integer('korea_isolCnt')->comment('국내 치료중 환자 수');
            $table->integer('korea_qurRate')->comment('코로나 발생률');
            $table->integer('korea_incDec')->comment('전일대비 확진자 수');
            $table->integer('korea_incDecK')->comment('내국인 확진자 수');
            $table->integer('korea_incDecF')->comment('외국인 확진자 수');

            $table->integer('seoul_totalCnt');
            $table->integer('seoul_recCnt');
            $table->integer('seoul_deathCnt');
            $table->integer('seoul_isolCnt');
            $table->integer('seoul_qurRate');
            $table->integer('seoul_incDec');
            $table->integer('seoul_incDecK');
            $table->integer('seoul_incDecF');

            $table->integer('busan_totalCnt');
            $table->integer('busan_recCnt');
            $table->integer('busan_deathCnt');
            $table->integer('busan_isolCnt');
            $table->integer('busan_qurRate');
            $table->integer('busan_incDec');
            $table->integer('busan_incDecK');
            $table->integer('busan_incDecF');

            $table->integer('daegu_totalCnt');
            $table->integer('daegu_recCnt');
            $table->integer('daegu_deathCnt');
            $table->integer('daegu_isolCnt');
            $table->integer('daegu_qurRate');
            $table->integer('daegu_incDec');
            $table->integer('daegu_incDecK');
            $table->integer('daegu_incDecF');

            $table->integer('incheon_totalCnt');
            $table->integer('incheon_recCnt');
            $table->integer('incheon_deathCnt');
            $table->integer('incheon_isolCnt');
            $table->integer('incheon_qurRate');
            $table->integer('incheon_incDec');
            $table->integer('incheon_incDecK');
            $table->integer('incheon_incDecF');

            $table->integer('gwangju_totalCnt');
            $table->integer('gwangju_recCnt');
            $table->integer('gwangju_deathCnt');
            $table->integer('gwangju_isolCnt');
            $table->integer('gwangju_qurRate');
            $table->integer('gwangju_incDec');
            $table->integer('gwangju_incDecK');
            $table->integer('gwangju_incDecF');

            $table->integer('daejeon_totalCnt');
            $table->integer('daejeon_recCnt');
            $table->integer('daejeon_deathCnt');
            $table->integer('daejeon_isolCnt');
            $table->integer('daejeon_qurRate');
            $table->integer('daejeon_incDec');
            $table->integer('daejeon_incDecK');
            $table->integer('daejeon_incDecF');

            $table->integer('ulsan_totalCnt');
            $table->integer('ulsan_recCnt');
            $table->integer('ulsan_deathCnt');
            $table->integer('ulsan_isolCnt');
            $table->integer('ulsan_qurRate');
            $table->integer('ulsan_incDec');
            $table->integer('ulsan_incDecK');
            $table->integer('ulsan_incDecF');

            $table->integer('sejong_totalCnt');
            $table->integer('sejong_recCnt');
            $table->integer('sejong_deathCnt');
            $table->integer('sejong_isolCnt');
            $table->integer('sejong_qurRate');
            $table->integer('sejong_incDec');
            $table->integer('sejong_incDecK');
            $table->integer('sejong_incDecF');

            $table->integer('gyeonggi_totalCnt');
            $table->integer('gyeonggi_recCnt');
            $table->integer('gyeonggi_deathCnt');
            $table->integer('gyeonggi_isolCnt');
            $table->integer('gyeonggi_qurRate');
            $table->integer('gyeonggi_incDec');
            $table->integer('gyeonggi_incDecK');
            $table->integer('gyeonggi_incDecF');

            $table->integer('gangwon_totalCnt');
            $table->integer('gangwon_recCnt');
            $table->integer('gangwon_deathCnt');
            $table->integer('gangwon_isolCnt');
            $table->integer('gangwon_qurRate');
            $table->integer('gangwon_incDec');
            $table->integer('gangwon_incDecK');
            $table->integer('gangwon_incDecF');

            $table->integer('chungbuk_totalCnt');
            $table->integer('chungbuk_recCnt');
            $table->integer('chungbuk_deathCnt');
            $table->integer('chungbuk_isolCnt');
            $table->integer('chungbuk_qurRate');
            $table->integer('chungbuk_incDec');
            $table->integer('chungbuk_incDecK');
            $table->integer('chungbuk_incDecF');

            $table->integer('chungnam_totalCnt');
            $table->integer('chungnam_recCnt');
            $table->integer('chungnam_deathCnt');
            $table->integer('chungnam_isolCnt');
            $table->integer('chungnam_qurRate');
            $table->integer('chungnam_incDec');
            $table->integer('chungnam_incDecK');
            $table->integer('chungnam_incDecF');

            $table->integer('jeonbuk_totalCnt');
            $table->integer('jeonbuk_recCnt');
            $table->integer('jeonbuk_deathCnt');
            $table->integer('jeonbuk_isolCnt');
            $table->integer('jeonbuk_qurRate');
            $table->integer('jeonbuk_incDec');
            $table->integer('jeonbuk_incDecK');
            $table->integer('jeonbuk_incDecF');

            $table->integer('jeonnam_totalCnt');
            $table->integer('jeonnam_recCnt');
            $table->integer('jeonnam_deathCnt');
            $table->integer('jeonnam_isolCnt');
            $table->integer('jeonnam_qurRate');
            $table->integer('jeonnam_incDec');
            $table->integer('jeonnam_incDecK');
            $table->integer('jeonnam_incDecF');

             $table->integer('gyeongbuk_totalCnt');
             $table->integer('gyeongbuk_recCnt');
             $table->integer('gyeongbuk_deathCnt');
             $table->integer('gyeongbuk_isolCnt');
             $table->integer('gyeongbuk_qurRate');
             $table->integer('gyeongbuk_incDec');
             $table->integer('gyeongbuk_incDecK');
             $table->integer('gyeongbuk_incDecF');

            $table->integer('gyeongnam_totalCnt');
            $table->integer('gyeongnam_recCnt');
            $table->integer('gyeongnam_deathCnt');
            $table->integer('gyeongnam_isolCnt');
            $table->integer('gyeongnam_qurRate');
            $table->integer('gyeongnam_incDec');
            $table->integer('gyeongnam_incDecK');
            $table->integer('gyeongnam_incDecF');

            $table->integer('jeju_totalCnt');
            $table->integer('jeju_recCnt');
            $table->integer('jeju_deathCnt');
            $table->integer('jeju_isolCnt');
            $table->integer('jeju_qurRate');
            $table->integer('jeju_incDec');
            $table->integer('jeju_incDecK');
            $table->integer('jeju_incDecF');


            $table->timestamps();

            $table->index('counting_date');
        });
    }






    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covid_histories');
    }
};
