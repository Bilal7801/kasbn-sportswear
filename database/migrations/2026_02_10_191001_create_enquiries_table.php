<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();

            // 👤 User Info
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();

            // 🏷️ Enquiry Type (sportswear related)
            $table->enum('enquiry_type', [
                'bulk_order',
                'custom_design',
                'pricing',
                'export',
                'general'
            ])->default('general');

            // 🧵 Sportswear Details
            $table->string('product_category')->nullable(); // e.g. T-Shirts, Tracksuits
            $table->integer('quantity')->nullable();

            // 💬 Message
            $table->text('message');

            // 🌍 GeoIP Data
            $table->string('ip_address')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('city')->nullable();

            // 🖥️ Meta (optional but powerful)
            $table->string('device')->nullable();  // Mobile / Desktop
            $table->string('browser')->nullable();

            // 📌 Admin Status
            $table->enum('status', [
                'new',
                'in_progress',
                'completed'
            ])->default('new');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
