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
        Schema::create('deal_ppomppus', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('ppomppu');
            $table->string('title');
            $table->string('url');
            $table->string('category');
            $table->string('writer');
            $table->string('num')->unique();
            $table->dateTime('write_datetime')->nullable();
            $table->unsignedInteger('views_on_local')->default(0);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_closed')->default(false);
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
        Schema::dropIfExists('deal_ppomppus');
    }
};
