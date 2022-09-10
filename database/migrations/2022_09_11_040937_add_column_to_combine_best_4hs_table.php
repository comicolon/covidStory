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
        Schema::table('combine_best_4hs', function (Blueprint $table) {
            $table->unsignedInteger('comments')->nullable();
            $table->integer('t_score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('combine_best_4hs', function (Blueprint $table) {
            //
        });
    }
};
