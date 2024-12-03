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
        Schema::create('sops', function (Blueprint $table) {
            $table->id('id_sop');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_kategorisop');
            $table->string('nama_sop');
            $table->timestamps();

            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategorisop')->references('id_kategorisop')->on('kategori_sops')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('sops', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_sop',
        //         'id_dokumen',
        //         'id_prodi',
        //         'id_kategorisop',
        //         'nama_sop',
        //         'file',
        //     ]);
        // });
        Schema::dropIfExists('sops');
    }
};