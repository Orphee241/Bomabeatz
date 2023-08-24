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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->integer("montant")->nullable();
            $table->string("nom_utilisateur");
            $table->string("reference");
            $table->unsignedBigInteger("id_utilisateur");
            $table->foreign("id_utilisateur")->references("id")->on("utilisateurs");
            $table->string("nom_beat");
            $table->dateTime("date");
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
        Schema::dropIfExists('paiements');
    }
};