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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu', 191);
            $table->string('url', 191)->default('#');
            $table->string('icon', 191)->nullable();
            $table->string('parent_id', 191)->nullable();
            $table->string('urutan', 191)->nullable();
            $table->enum('target', ['_blank', '_self']);
            $table->enum("type", ['internal', 'external']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
