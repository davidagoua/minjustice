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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('sexe', [
                'Homme','Femme'
            ]);
            $table->boolean('actif')->default(false);
            $table->unsignedInteger('register_step');
            $table->string('situation_matrimonial')->nullable();
            $table->uuid()->nullable();
            $table->string('photo')->nullable();
            $table->string('lieu_naissance');
            $table->date('date_naissance');
            $table->string('contact');
            $table->string('quartier');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('last_name_pere')->nullable();
            $table->string('first_name_pere')->nullable();
            $table->date('date_naissance_pere')->nullable();
            $table->string('lieu_naissance_pere')->nullable();
            $table->string('last_name_mere')->nullable();
            $table->string('first_name_mere')->nullable();
            $table->date('date_naissance_mere')->nullable();
            $table->string('lieu_naissance_mere')->nullable();

        });
    }

    /*
 * "email",
    "last_name",
    "first_name",
    "date_naissance",
    "lieu_naissance",
    "situation_matrimonial",
    "contact",
    "sexe",
    "quartier",
    "last_name_pere",
    "first_name_pere",
    "date_naissance_pere",
    "lieu_naissance_pere",
    "last_name_mere",
    "first_name_mere",
    "date_naissance_mere",
    "lieu_naissance_mere",
    "register_step",
    "name",
    "password",
    "updated_at",
    "created_at"
 */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
