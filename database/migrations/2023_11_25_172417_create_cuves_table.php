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
        Schema::create('cuves', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nom');
            $table->integer('capacite');
            $table->enum('contenu',['essence', 'diesiel']);
            $table->boolean('active');
            $table->foreignUuid('gerant_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuves');
    }
};
