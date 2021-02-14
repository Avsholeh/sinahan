<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidang', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_mulai');
            $table->foreignId('hakim_id')->constrained('hakim');
            $table->foreignId('jaksa_id')->constrained('jaksa');
            $table->foreignId('narapidana_id')->constrained('narapidana');
            $table->string('reg_perkara')->nullable();
            $table->string('reg_tahanan')->nullable();
            $table->string('reg_bukti')->nullable();
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
        Schema::dropIfExists('sidangs');
    }
}
