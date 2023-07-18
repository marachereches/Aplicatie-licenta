<?php

use App\Models\Eveniment;
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
        Schema::create('imagini_ev', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Eveniment::class);
            $table->string('imagine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagini_ev');
    }
};
