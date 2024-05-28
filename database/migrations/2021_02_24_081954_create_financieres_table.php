<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financieres', function (Blueprint $table) {
            $table->id();
            $table->string('nom_structure');
            $table->text('description');
            $table->enum('partenariat_orange',['oui','non']);
            $table->string('nom_prenom_directeur');
            $table->string('adresses');
            $table->string('coordonnee');
            $table->string('site_web');
            $table->string('email');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('financieres');
    }
}
