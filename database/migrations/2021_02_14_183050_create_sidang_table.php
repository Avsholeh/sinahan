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
            $table->foreignId('hakim_id')->nullable()->constrained('hakim')->nullOnDelete();
            $table->foreignId('jaksa_id')->nullable()->constrained('jaksa')->nullOnDelete();
            $table->foreignId('narapidana_id')->nullable()->constrained('narapidana')->nullOnDelete();
            $table->string('pasal');
//            $table->string('jpu');
            $table->string('keterangan');
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
