<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengabdians', function (Blueprint $table) {
            $table->id('id_pengabdian');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_kegiatan');
            $table->year('tahun');
            $table->integer('jumlah_peserta');
            $table->timestamps();

            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengabdians');
    }
};