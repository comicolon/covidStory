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
        Schema::table('covid_news', function (Blueprint $table) {
            $table->string('board_name')->default('covidNews');
            $table->integer('comment_count')->default(0);
            $table->boolean('canComment')->default(false)->comment('댓글 허용여부');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('covid_news', function (Blueprint $table) {
            //
        });
    }
};
