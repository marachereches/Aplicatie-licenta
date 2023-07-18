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
        Schema::create('produse_comanda', function (Blueprint $table) {
            $table->id();
            $table->integer("comanda_id");
            $table->integer("prod_id");
            $table->integer("cant");
            $table->string("pret");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produse_comanda');
    }
};
