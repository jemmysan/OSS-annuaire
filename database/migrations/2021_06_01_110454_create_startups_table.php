<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->string('nom_startup')->unique();
            $table->text('description');
            $table->enum('partenariat_orange',['oui','non']);
            $table->date('date_creation');
            $table->string('ceo_co_fondateur');
            $table->string('adresses');
            $table->string('logo');
            $table->string('filename');
            $table->string('video');
            $table->enum('autre_part',['oui','non']);
            $table->enum('leve_fond',['oui','non']);
            $table->string('montant_fonds');
            $table->date('date_leve_fond');
            $table->string('coordonnee');
            $table->string('site_web');
            $table->string('email')->unique();
            $table->string('referent');
            $table->enum('statut',['SA','SARL','SAS']);
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
        Schema::dropIfExists('startups');
    }
}
