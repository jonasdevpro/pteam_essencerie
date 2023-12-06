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
        Schema::create('pompes', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nom');
            $table->string('description')->nullable();
            $table->boolean('essence')->default(false);
            $table->boolean('diesel')->default(false);
            $table->tinyInteger('active');
            $table->foreignUuid('user_id')->nullable()->constrained('users');
            $table->foreignUuid('cuve_id_essence');
            $table->foreignUuid('cuve_id_diesel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pompes');
    }
};
