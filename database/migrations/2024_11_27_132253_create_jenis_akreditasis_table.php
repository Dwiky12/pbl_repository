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
        Schema::create('jenis_akreditasis', function (Blueprint $table) {
            $table->id('id_jenisakreditasi');
            $table->string('akreditasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('jenis_akreditasis', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_jenisakreditasi',
        //         'akreditasi',
        //     ]);
        // });
        Schema::dropIfExists('jenis_akreditasis');
    }
};