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
        Schema::create('produse', function (Blueprint $table) {
            $table->id();
            $table->string("nume", 255)->nullable();
            $table->string("image")->nullable();
            $table->string("descriere")->nullable();
            $table->decimal("pret", 6, 2)->default(0.0);
            $table->integer('stoc')->default(0);
            $table->integer('cod');
            $table->integer('cat');
            $table->boolean("fav")->default(false);
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
   public function down(): void
    {
        Schema::dropIfExists('produse');
    }
};
