<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupSecteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_secteur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('startup_id');
            $table->foreign('startup_id')
                ->references('id')
                ->on('startups')
                ->OnDelete('cascade');
            $table->unsignedBigInteger('secteur_id');
            $table->foreign('secteur_id')
                ->references('id')
                ->on('secteurs')
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
        Schema::dropIfExists('startup_secteur');
    }
}
