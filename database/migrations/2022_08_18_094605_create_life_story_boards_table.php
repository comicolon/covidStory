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
        Schema::create('life_story_boards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('u_id')->comment('작성자 아이디');
            $table->string('title')->comment('제목');
            $table->longText('content')->comment('내용');
            $table->string('source')->nullable()->comment('출처');
            $table->boolean('canComment')->default(true)->comment('댓글허용여부');
            $table->integer('like')->default(0)->comment('추천');
            $table->integer('dislike')->default(0)->comment('비추천');
            $table->boolean('isBest')->default(false)->comment('베스트여부');
            $table->boolean('is_published')->default(true)->comment('공개여부');
            $table->boolean('is_deleted')->default(false)->comment('삭제여부');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('life_story_boards');
    }
};
