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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content')->type('longtext');
            $table->string('image')->nullable();
            $table->foreignId("created_by")->references("id")->on("users");
            $table->integer("id_bidang");
            $table->foreign("id_bidang")->references("id")->on("bidangs");
            $table->enum("status", ["publish", "draft", "submission", "reject"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
