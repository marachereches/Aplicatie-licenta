<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comenzi', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string("nr");
            $table->string("nume");
            $table->string("prenume");
            $table->string("email");
            $table->string("adresa");
            $table->string("tara");
            $table->string("oras");
            $table->string("codp");
            $table->string("telefon");
            $table->string("plata");
            $table->string("numecard")->nullable();
            $table->string("nrcard")->nullable();
            $table->string("datacard")->nullable();
            $table->string("cvv")->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comenzi');
    }
};
