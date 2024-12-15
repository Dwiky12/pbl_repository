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
        Schema::create('profil_prodis', function (Blueprint $table) {
            $table->id('id_profilprodi');
            $table->unsignedBigInteger('id_prodi');
            $table->integer('tahun_penggunaan');
            $table->integer('revisi_ke');
            $table->string('file_dokumen')->nullable();
            $table->string('status')->default('pending'); // Tambahkan field status
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('profil_prodis');
    }
};