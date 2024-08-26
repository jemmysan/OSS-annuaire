<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupIndicateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_indicateurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('startup_id');
            $table->foreign('startup_id')
                ->references('id')
                ->on('startups')
                ->OnDelete('cascade');

            $table->unsignedBigInteger('indicateur_id');
            $table->foreign('indicateur_id')
                ->references('id')
                ->on('indicateurs')
                ->OnDelete('cascade');

            $table->date('date');
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
        Schema::dropIfExists('startup_indicateurs');
    }
}
