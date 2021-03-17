<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('roles')->default('USER');
            $table->binary('foto')->nullable();
            $table->rememberToken();
//            $table->timestamps();
//            $table->string('nama_lengkap');
//            $table->string('tempat_lahir')->nullable();
//            $table->date('tanggal_lahir')->nullable();
//            $table->string('jenis_kelamin')->nullable();
//            $table->string('agama')->nullable();
//            $table->string('pekerjaan')->nullable();
//            $table->string('pendidikan')->nullable();
//            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
