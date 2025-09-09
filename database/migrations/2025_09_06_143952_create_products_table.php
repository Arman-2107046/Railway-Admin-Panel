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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'unisex', 'kids', 'not-applicable']);
            $table->enum('category', [
                'knitwear',
                'sweater',
                'woven-denim',
                'woven-non-denim',
                'woven-outerwear',
                'activewear',
                'lingerie',
                'workwear',
                'sleepwear',
                'leather-items',
                'handicraft',
                'home-textile'
            ]);
            $table->string('image')->nullable(); // <-- Add this line


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
