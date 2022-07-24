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
            $table->string('nom');
            $table->string('reference');
            $table->string('marque');
            $table->double('prixAchat');
            $table->double('prixVente');
            $table->double('total');
            $table->double('totalHTVA');
            $table->string('emplacement');
            $table->string('type');
            $table->string('unite');
            $table->string('designation');
            $table->Integer('stockMin');
            $table->Integer('stockInit');
            $table->integer('niveauStock');
            $table->boolean('vente')->default(false);
            $table->boolean('location')->default(false);
            $table->foreignId("fournisseur_id")->nullable()->constrained();
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
