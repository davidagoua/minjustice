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
        Schema::create('type_documents', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('required_fields')->nullable();
            $table->uuid()->nullable();
            $table->string('type')->nullable();
            $table->string('specificite')->nullable();
            $table->json('documents_requis')->nullable();
            $table->string('tag')->nullable();
            $table->string('url')->nullable();
            $table->unsignedInteger('montant')->default(100);
            $table->unsignedInteger('type_demande_id')->default(1);
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
        Schema::dropIfExists('type_documents');
    }
};
