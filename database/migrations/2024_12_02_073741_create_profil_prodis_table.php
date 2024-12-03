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
        Schema::create('profil_prodis', function (Blueprint $table) {
            $table->id('id_profilprodi');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->year('tahun_pengunaan');
            $table->integer('revisi_ke');
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
        // Schema::table('profil_prodis', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_profilprodi',
        //         'id_dokumen',
        //         'id_prodi',
        //         'tahun_pengunaan',
        //         'revisi_ke',
        //         'file',
        //     ]);
        // });
        Schema::dropIfExists('profil_prodis');
    }
};