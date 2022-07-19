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
            $table->String('tele');
            $table->String('nom');
            $table->String('email');
            $table->double('tauxTva');
            $table->Integer('code');
            $table->String('remarque');
            $table->String('adresse');
            $table->String('teleSecd');
            $table->integer('numTva');
            $table->boolean('estActif');
            $table->text('notreFour');
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
