<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_commandes', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->date('date');
            $table->String('description');
            $table->date('date_livraison');
            $table->String('status');
            $table->double('total');
            $table->double('totalHTVA');
            $table->String('adresse_livraison');
            $table->foreignId("fournisseur_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bon_commandes');
    }
};
