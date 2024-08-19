<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statut_startups', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('statut_id');
            $table->foreign('statut_id')
                ->references('id')
                ->on('statuts')
                ->OnDelete('cascade');

            $table->unsignedBigInteger('startup_id');
            $table->foreign('startup_id')
                ->references('id')
                ->on('startups')
                ->OnDelete('cascade');
                
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
        Schema::dropIfExists('statut_startups');
    }
}
