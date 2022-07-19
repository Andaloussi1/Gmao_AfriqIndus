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
        Schema::create('cmds', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->String('description');
            $table->String('adresseLivraison');
            $table->String('dateCreation');
            $table->date('dateLivPrevue');
            $table->String('status');
            $table->double('total');
            $table->double('totalHtva');
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
        Schema::dropIfExists('cmds');
    }
};
