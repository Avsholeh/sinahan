<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJaksaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaksa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nip', 100)->nullable();
            $table->string('pangkat')->nullable();
            $table->string('golongan')->nullable();
            $table->string('jabatan');
            $table->string('agama', 100);
            $table->string('jenis_kelamin', 100);
            $table->string('pendidikan', 100)->nullable();
            $table->string('status', 100)->default('AKTIF');
            $table->mediumText('foto')->nullable();
        });

        DB::statement("ALTER TABLE jaksa MODIFY foto MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jaksa');
    }
}
