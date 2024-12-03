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
        Schema::create('pengembangan_diris', function (Blueprint $table) {
            $table->id('id_pengembangandiri');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_kegiatan');
            $table->year('tahun');
            $table->string('semester');
            $table->unsignedBigInteger('id_pegawai');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('jenis', ['Internal', 'Eksternal']);
            $table->unsignedBigInteger('id_tingkat');
            $table->string('penyelenggara');
            $table->string('tempat');
            $table->integer('lama');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tingkat')->references('id_tingkat')->on('tingkats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembangan_diris');
    }
};