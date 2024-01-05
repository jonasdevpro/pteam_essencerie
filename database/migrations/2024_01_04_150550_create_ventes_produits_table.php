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
        Schema::create('ventes_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('produit_id');
            $table->foreignUuid('vente_id');
            $table->integer('qte_produis_vendues')->default(0);
            $table->string('prix_unitaire')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes_produits');
    }
};