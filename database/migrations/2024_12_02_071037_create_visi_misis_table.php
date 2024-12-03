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
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id('id_visimisi');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->text('visi');
            $table->text('misi');
            $table->string('tahun_pemberlakuan');
            $table->string('semester');
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
        // Schema::table('visi_misis', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_visimisi',
        //         'id_dokumen',
        //         'id_prodi',
        //         'id_tingkat',
        //         'visi',
        //         'misi',
        //         'tahun_pemberlakuan',
        //         'revisi_ke',
        //         'file',   
        //     ]);
        // });
        Schema::dropIfExists('visi_misis');
    }
};