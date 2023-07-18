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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('adresa')->nullable();
            $table->string('tara')->nullable();
            $table->string('oras')->nullable();
            $table->integer('codp')->nullable();
            $table->integer('telefon')->nullable();
            $table->string('nrcard')->nullable();
            $table->date('datacard')->nullable();
            $table->boolean('sterge')->default(0)->nullable();
            $table->boolean('eveniment')->default(0)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
  /*  public function down(): void
    {
        Schema::dropIfExists('users');
    }*/
};
