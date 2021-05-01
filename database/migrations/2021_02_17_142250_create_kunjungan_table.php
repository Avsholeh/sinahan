<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();

            $table->foreignId('narapidana_id')
                ->constrained('narapidana')->nullOnDelete();

            $table->foreignId('pengguna_id')
                ->constrained('pengguna')->nullOnDelete();

            $table->text('keperluan');
            $table->string('status')->default('BELUM DIVERIFIKASI');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungan');
    }
}
