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
        Schema::table('best_dcinsides', function (Blueprint $table) {
            $table->unsignedInteger('before_views')->nullable();
            $table->unsignedInteger('before_comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('best_dcinsides', function (Blueprint $table) {
            //
        });
    }
};
