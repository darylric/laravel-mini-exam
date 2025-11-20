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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Post title
            $table->text('content');          // Post content
            $table->foreignId('user_id')     // Foreign key reference to the users table
            ->constrained()           // Automatically references the 'id' column in the 'users' table
            ->onDelete('cascade');    // Delete all posts when a user is deleted
            $table->timestamp('published_at')->nullable(); // Published date (nullable)
            $table->timestamps();            // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
