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
        Schema::create('dokumen_kurikulums', function (Blueprint $table) {
            $table->id('id_dokumenkurikulum');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_kurikulum');
            $table->year('tahun_pemberlakuan');
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
        // Schema::table('dokumen_kurikulums', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_dokumenkurikulum',
        //         'id_dokumen',
        //         'id_prodi',
        //         'nama_kurikulum',
        //         'tahun_pemberlakuan',
        //         'semester_pemberlakuan',
        //         'revisi_ke',
        //         'file',
        //     ]);
        // });
        Schema::dropIfExists('dokumen_kurikulums');
    }
};