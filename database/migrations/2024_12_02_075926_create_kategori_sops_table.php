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
        Schema::create('kategori_sops', function (Blueprint $table) {
            $table->id('id_kategorisop');
            $table->string('nama_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('kategori_sops', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_kategorisop',
        //         'nama_kategori',
        //     ]);
        // });
        Schema::dropIfExists('kategori_sops');
    }
};