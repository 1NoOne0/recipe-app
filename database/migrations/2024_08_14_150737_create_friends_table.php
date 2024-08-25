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
        Schema::create('friends', function (Blueprint $table) {
            $table->string('user_email');
            $table->string('friend_email');
            $table->string('status');
            $table->timestamp('started_at')->useCurrent();
            $table->primary(['user_email', 'friend_email']);
            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('friend_email')->references('email')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
