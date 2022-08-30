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
        Schema::create('outils', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->foreignId("outils_stock_id")->constrained();
            $table->double('prix');
            $table->boolean('louer');
            $table->integer('periode')->nullable();//duree
            $table->string('periodicite')->nullable();//period par mois/semaine/jour
            $table->date('date');
            $table->integer('quantite');
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
        Schema::dropIfExists('outils');
    }
};
