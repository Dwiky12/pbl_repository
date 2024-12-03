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
        Schema::create('akreditasis', function (Blueprint $table) {
            $table->id('id_akreditasi');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_prodi');
            $table->string('no_sk');
            $table->unsignedBigInteger('id_jenisakreditasi');
            $table->float('nilai_akreditasi');
            $table->unsignedBigInteger('id_lembaga');
            $table->unsignedBigInteger('id_tingkat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->timestamps();

            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenisakreditasi')->references('id_jenisakreditasi')->on('jenis_akreditasis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_lembaga')->references('id_lembaga')->on('lembagas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tingkat')->references('id_tingkat')->on('tingkats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('akreditasis', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_akreditasi',
        //         'id_prodi',
        //         'no_sk_akreditasi',
        //         'id_jenisakreditasi',
        //         'nilai_akreditasi',
        //         'id_lembaga',
        //         'id_tingkat',
        //         'tanggal_mulai',
        //         'tanggal_berakhir',
        //         'file',
        //     ]);
        // });
        Schema::dropIfExists('akreditasis');
    }
};