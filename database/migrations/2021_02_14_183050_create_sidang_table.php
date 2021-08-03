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
            $table->foreignId('hakim_id')->nullable()
                ->constrained('hakim')->cascadeOnDelete();
            $table->foreignId('jaksa_id')->nullable()
                ->constrained('jaksa')->cascadeOnDelete();
            $table->foreignId('narapidana_id')->nullable()
                ->constrained('narapidana')->cascadeOnDelete();
            $table->string('pasal');
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
        Schema::dropIfExists('sidang');
    }
}
