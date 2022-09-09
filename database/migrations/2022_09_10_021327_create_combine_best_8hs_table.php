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
        Schema::create('combine_best_8hs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rating');
            $table->string('site_name');
            $table->string('title');
            $table->string('url');
            $table->string('writer');
            $table->dateTime('write_datetime');
            $table->unsignedInteger('views');
            $table->unsignedInteger('comment_count')->nullable();
            $table->string('num')->comment('사이트에 등록된 고유 글번호');
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
        Schema::dropIfExists('combine_best_8hs');
    }
};
