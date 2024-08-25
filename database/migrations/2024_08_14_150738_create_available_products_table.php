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
        Schema::create('available_products', function (Blueprint $table) {
            $table->string('user_email');
            $table->string('ingredient_name');
            $table->decimal('quantity', 10, 2);
            $table->primary(['user_email', 'ingredient_name']);
            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('ingredient_name')->references('name')->on('ingredients')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_products');
    }
};
