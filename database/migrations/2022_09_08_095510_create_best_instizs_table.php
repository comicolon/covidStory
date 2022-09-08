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
        Schema::create('best_instizs', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('instiz');
            $table->string('title');
            $table->string('url');
            $table->string('writer');
            $table->dateTime('write_datetime');
            $table->unsignedInteger('views');
            $table->unsignedInteger('comment_count')->nullable();
            $table->string('num')->unique()->comment('사이트에 등록된 고유 글번호');
            $table->unsignedInteger('views_on_local')->default(0);
            $table->boolean('is_week_best')->default(false);
            $table->boolean('is_month_best')->default(false);
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
        Schema::dropIfExists('best_instizs');
    }
};
