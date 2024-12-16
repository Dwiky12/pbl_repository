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
        Schema::create('seminars', function (Blueprint $table) {
            $table->id('id_seminar');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_kegiatan');
            $table->year('tahun');
            $table->string('semester');
            $table->unsignedBigInteger('id_tingkat');
            $table->unsignedBigInteger('id_kegiatan');
            $table->unsignedBigInteger('id_skema');
            $table->string('tempat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedBigInteger('id_narasumber');
            $table->string('file_dokumen')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tingkat')->references('id_tingkat')->on('tingkats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_skema')->references('id_skema')->on('skemas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_narasumber')->references('id_narasumber')->on('narasumbers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminars');
    }
};