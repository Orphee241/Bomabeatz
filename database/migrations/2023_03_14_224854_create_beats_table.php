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
        if(!Schema::hasTable("beats")){ 
            Schema::create('beats', function (Blueprint $table) {
                $table->id();
                $table->string("nom");
                $table->string("image");
                $table->string("beatmaker");
                $table->unsignedBigInteger("like")->nullable();
                $table->string("licence");
                $table->string("prix");
                $table->unsignedBigInteger("beatmaker_id");
                $table->foreign("beatmaker_id")->references("id")->on("beatmaker");
                $table->date("date");
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
        Schema::dropIfExists('beats');
    }
};
