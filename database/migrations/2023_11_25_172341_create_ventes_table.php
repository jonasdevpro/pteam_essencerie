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
        Schema::create('ventes', function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('index_debut');
            $table->integer('index_fin');
            $table->boolean('active');
            $table->foreignUuid('chef_piste_id');
            $table->foreignUuid('pompiste_id');
            $table->foreignUuid('pompe_id');
            $table->timestamp('debut_service');
            $table->timestamp('fin_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Vente');
    }
};
