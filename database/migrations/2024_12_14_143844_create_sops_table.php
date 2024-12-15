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
        Schema::create('sops', function (Blueprint $table) {
            $table->id('id_sop');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_kategorisop');
            $table->string('nama_sop');
            $table->string('file_dokumen')->nullable();
            $table->string('status')->default('pending'); // Tambahkan field status
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategorisop')->references('id_kategorisop')->on('kategori_sops')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('sops');
    }
};