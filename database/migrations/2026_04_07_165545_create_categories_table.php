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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Essential for SEO URLs
            $table->text('description')->nullable();
            $table->string('icon')->nullable(); // For your FontAwesome input
            $table->string('image')->nullable(); // For the thumbnail
            $table->boolean('status')->default(true); // Your toggle switch

            // Self-referencing relationship for Parent Categories
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
