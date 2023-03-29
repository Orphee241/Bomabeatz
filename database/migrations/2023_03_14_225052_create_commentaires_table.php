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
        if(!Schema::hasTable("commentaires")){ 
            Schema::create('commentaires', function (Blueprint $table) {
                $table->id();
                $table->text("commentaires");
                $table->unsignedBigInteger("beat_id");
                $table->foreign("beat_id")->references("id")->on("beats");
                $table->string("auteur");
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
        Schema::dropIfExists('commentaires');
    }
};
