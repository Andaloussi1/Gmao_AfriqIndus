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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('tele');
            $table->string('nom');
            $table->string('email');
            $table->double('tauxTva');
            $table->string('code');
            $table->string('remarque');
            $table->string('adresse');
            $table->string('teleSecd');
            $table->integer('numTva');
            $table->boolean('estActif');
            $table->string('notreFour');
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
        Schema::dropIfExists('fournisseurs');
    }
};
