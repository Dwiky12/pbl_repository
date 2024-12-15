<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('dokumen_kurikulums', function (Blueprint $table) {
            $table->id('id_dokumenkurikulum');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_kurikulum');
            $table->year('tahun');
            $table->string('semester');
            $table->integer('revisi_ke');
            $table->string('file_dokumen')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('dokumen_kurikulums');
    }
};