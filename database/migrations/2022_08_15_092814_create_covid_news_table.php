<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('제목');
            $table->bigInteger('u_id')->default(optional(Auth::user())->id)->comment('작성자아이디');
            $table->string('u_nickname')->default(optional(Auth::user())->nickname)->comment('작성자별명');
            $table->longText('content')->comment('내용');
            $table->string('source')->Nullable()->comment('출처');
            $table->string('image_name')->nullable()->comment('파일명');
            $table->string('image_path')->nullable()->comment('파일경로');
            $table->integer('views')->default(0)->comment('조회수');
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
        Schema::dropIfExists('covid_news');
    }
};
