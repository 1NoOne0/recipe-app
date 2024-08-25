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
        Schema::create('reviews', function (Blueprint $table) {
            $table->string('author_email');
            $table->unsignedBigInteger('recipe_id');
            $table->integer('rating');
            $table->timestamp('date')->useCurrent();
            $table->string('text')->nullable();
            $table->primary(['author_email', 'recipe_id']);
            $table->foreign('author_email')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
