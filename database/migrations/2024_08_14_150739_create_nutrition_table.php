<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('nutritions', function (Blueprint $table) {
            $table->unsignedBigInteger('recipe_id')->primary();
            $table->decimal('fats', 10, 2);
            $table->decimal('carbs', 10, 2);
            $table->decimal('proteins', 10, 2);
            $table->decimal('calories', 10, 2);
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition');
    }
};
