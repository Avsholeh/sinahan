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
            $table->dateTime('tanggal');
//            $table->foreignId('hakim_id')->constrained('hakim');
            $table->foreignId('hakim_id')->constrained('pegawai');
            $table->foreignId('narapidana_id')->constrained('narapidana');
            $table->string('pasal');
            $table->string('jpu');
            $table->string('keterangan');
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
