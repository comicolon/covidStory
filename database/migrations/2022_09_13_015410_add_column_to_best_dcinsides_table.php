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
            $table->boolean('is_new')->default(false);
            $table->boolean('is_front_page')->default(false);
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
