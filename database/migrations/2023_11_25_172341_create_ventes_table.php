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
            $table->string('heure_service');
            $table->string('index_depart_essence');
            $table->string('index_arrive_essence');
            $table->string('index_depart_gazoile');
            $table->string('index_arrive_gazoile');
            $table->string('qte_essence');
            $table->string('prix_essence');
            $table->string('qte_gazoile');
            $table->string('prix_gazoile');
            $table->string('montant');
            $table->string('montant_recu');
            $table->string('ecart');
            $table->integer('qte_produis_vendues')->default(0);
            $table->boolean('active')->default(true);
            $table->foreignUuid('produit_id');
            $table->foreignUuid('chef_piste_id');
            $table->foreignUuid('pompiste_id');
            $table->foreignUuid('pompe_id');
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