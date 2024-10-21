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
        Schema::create('jalur_masuk_ppdb', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jalur');
            $table->longText('description')->nullable();
            $table->string("persyaratan")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalur_masuk_p_p_d_b_s');
    }
};
