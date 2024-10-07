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
        Schema::create('profile_anggotas', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("jabatan");
            $table->text("description")->nullable();
            $table->text("image")->nullable();
            $table->integer("urutan")->default(1);
            $table->enum("jenis_profile", array_keys(JENIS_PROFILE))->default(array_keys(JENIS_PROFILE)[0]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_anggotas');
    }
};
