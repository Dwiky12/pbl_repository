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
        Schema::create('tingkats', function (Blueprint $table) {
            $table->id('id_tingkat');
            $table->string('tingkatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('tingkats', function (Blueprint $table){
        //     $table->dropColumn([
        //         'id_tingkat',
        //         'tingkatan',
        //     ]);
        // });

        Schema::dropIfExists('tingkats');
    }
};