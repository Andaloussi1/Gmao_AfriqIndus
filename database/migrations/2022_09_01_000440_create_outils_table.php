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
            $table->string('reference');
            $table->string('nom');
            $table->string('marque');
            $table->string('type');
            $table->integer('stock');
            $table->integer('stockLoue');
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
