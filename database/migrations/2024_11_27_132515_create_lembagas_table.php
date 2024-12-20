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
        Schema::create('lembagas', function (Blueprint $table) {
            $table->id('id_lembaga');
            $table->string('nama_lembaga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('lembagas', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_lembaga',
        //         'nama_lembaga',
        //     ]);
        // });

        Schema::dropIfExists('lembagas');
    }
};