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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->String('type');
            $table->String('desc');
            $table->String('status');
            $table->date('dateDb');
            $table->date('dateFn');
            $table->boolean('etat');
            $table->integer('TempsNes');
            $table->integer('frequence');
            $table->foreignId('site_id')->constrained();
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
        Schema::dropIfExists('interventions');
    }
};
