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
            Schema::create('akreditasis', function (Blueprint $table) {
                $table->id('id_akreditasi');
                $table->unsignedBigInteger('id_prodi');
                $table->string('no_sk');
                $table->unsignedBigInteger('id_jenisakreditasi');
                $table->string('nilai_akreditasi');
                $table->unsignedBigInteger('id_lembaga');
                $table->unsignedBigInteger('id_tingkat');
                $table->date('tanggal_mulai');
                $table->date('tanggal_berakhir');
                $table->string('file_dokumen')->nullable();
                $table->string('status')->default('pending'); // Tambahkan field status
                $table->timestamps();
    
                $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('id_jenisakreditasi')->references('id_jenisakreditasi')->on('jenis_akreditasis')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('id_lembaga')->references('id_lembaga')->on('lembagas')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('id_tingkat')->references('id_tingkat')->on('tingkats')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    
        public function down() {
            Schema::dropIfExists('akreditasis');
        }
    };
    