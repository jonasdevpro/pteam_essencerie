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
            $table->boolean('essence');
            $table->boolean('diesel');
            $table->tinyInteger('active');
            $table->foreignUuid('user_id');
            $table->foreignUuid('cuve_id_essence');
            $table->foreignUuid('cuve_id_diesiel');
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
