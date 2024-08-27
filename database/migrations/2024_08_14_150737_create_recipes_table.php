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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author'); // This will be the foreign key
            $table->string('meal_time');
            $table->timestamps();

            // Adding foreign key constraint to 'author'
            $table->foreign('author')->references('email')->on('users')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            // Drop the foreign key constraint first before dropping the table
            $table->dropForeign(['author']);
        });

        Schema::dropIfExists('recipes');
    }
};
