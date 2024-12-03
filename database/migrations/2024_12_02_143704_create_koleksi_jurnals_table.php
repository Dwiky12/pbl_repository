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
        Schema::create('koleksi_jurnals', function (Blueprint $table) {
            $table->id('id_koleksijurnal');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_jurnal');
            $table->year('tahun');
            $table->string('semester');
            $table->unsignedBigInteger('id_tingkat');
            $table->enum('jenis_jurnal', ['Nasional', 'Internasional']);
            $table->enum('terindex', ['Scopus', 'Sinta', 'Lainnya']);
            $table->string('terindex_lainnya')->nullable();
            $table->string('penerbit');
            $table->string('volume');
            $table->integer('jumlah_eksemplar');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tingkat')->references('id_tingkat')->on('tingkats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksi_jurnals');
    }
};