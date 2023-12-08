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
            $table->integer('index_depart_essence');
            $table->integer('index_arrive_essence');
            $table->integer('index_depart_gazoile');
            $table->integer('index_arrive_gazoile');
            $table->boolean('active');
            $table->foreignUuid('chef_piste_id');
            $table->foreignUuid('pompiste_id');
            $table->foreignUuid('pompe_id');
            $table->timestamp('heure_service');
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
