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
        Schema::create('sous_equipements', function (Blueprint $table) {
            $table->id();
            $table->String('code');
            $table->String('type');
            $table->integer('quantite');
            $table->integer('tempsUtilEquip');
            $table->foreignId("equipement_id")->constrained();
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
        Schema::dropIfExists('sous_equipements');
    }
};
