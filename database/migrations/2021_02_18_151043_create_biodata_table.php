<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('biodata', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('user_id')->constrained('users');
//            $table->string('nama_lengkap');
//            $table->string('tempat_lahir');
//            $table->date('tanggal_lahir');
//            $table->string('jenis_kelamin');
//            $table->string('agama');
//            $table->string('pekerjaan');
//            $table->string('pendidikan');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
}
