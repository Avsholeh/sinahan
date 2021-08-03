<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPengunjungKunjungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pengunjung_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_pengunjung_id')
                ->constrained('data_pengunjung')->cascadeOnDelete();
            $table->foreignId('kunjungan_id')
                ->constrained('kunjungan')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pengunjung_kunjungan');
    }
}
