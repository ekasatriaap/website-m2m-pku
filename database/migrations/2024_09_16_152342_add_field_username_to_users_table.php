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
        Schema::table('users', function (Blueprint $table) {
            $table->after('email', function ($table) {
                $table->string('username')->nullable(false)->unique();
                $table->enum("level", ["root", "operator", "admin"]);
                $table->integer("id_bidang")->nullable()->default(null);

                $table->foreign("id_bidang")->references("id")->on("bidangs");
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
