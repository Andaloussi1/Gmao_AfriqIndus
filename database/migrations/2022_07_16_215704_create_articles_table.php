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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->String('reference');
            $table->String('nom');
            $table->String('marque');
            $table->double('prixAchat');
            $table->double('prixVente');
            $table->double('total');
            $table->double('totalHTVA');
            $table->String('emplacement');
            $table->String('type');
            $table->String('unite');
            $table->String('designation');
            $table->Integer('stockMin');
            $table->Integer('stockInit');
            $table->integer('niveauStock');
            $table->boolean('vente');
            $table->boolean('location');
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
        Schema::dropIfExists('articles');
    }
};
