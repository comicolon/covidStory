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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_id');
            $table->string('nickname');
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('부모 댓글의 아이디');
            $table->text('content');
            $table->boolean('is_published')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            //외래키 설정
            $table->foreign('u_id')->references('id')->on('users');
            $table->foreign('board_id')->references('id')->on('life_story_boards');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
