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
        if(!Schema::hasTable("utilisateurs")){ 
            Schema::create('utilisateurs', function (Blueprint $table) {
                $table->id();
                $table->string("pseudo");
                $table->string("email");
                $table->string("statut");
                $table->string("mdp");
                $table->string("confirmer_mdp");
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
};
