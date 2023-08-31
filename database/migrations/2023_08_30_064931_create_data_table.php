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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kota')->nullable();
            $table->string('main')->default('0');
            $table->string('menang')->default('0');
            $table->string('seri')->default('0');
            $table->string('kalah')->default('0');
            $table->string('gm')->default('0');
            $table->string('gk')->default('0');
            $table->string('point')->default('0');
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
        Schema::dropIfExists('data');
    }
};
