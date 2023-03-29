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
        if(!Schema::hasTable("beatmakers")){ 
            Schema::create('beatmakers', function (Blueprint $table) {
                $table->id();
                $table->string("pseudo");
                $table->string("email");
                $table->string("mdp");
                $table->string("confirmer_mdp");
                $table->datetime("date");
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
        Schema::dropIfExists('beatmakers');
    }
};
