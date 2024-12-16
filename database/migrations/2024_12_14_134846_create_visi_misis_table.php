<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id('id_visimisi');
            $table->unsignedBigInteger('id_prodi');
            $table->string('visi');
            $table->string('misi');
            $table->year('tahun_pemberlakuan');
            $table->string('semester');
            $table->integer('revisi_ke');
            $table->string('file_dokumen')->nullable();
            $table->string('status')->default('pending'); // Tambahkan field status
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('visi_misis');
    }
};