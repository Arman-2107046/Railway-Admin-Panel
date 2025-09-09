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
        Schema::create('news', callback: function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->boolean('is_featured')->default(false);
            //  enum in model
            $table->enum('type', ['draft', 'publish'])->default('draft');
            $table->enum('category',['Business & Industry','Techlonogy','Sustainability & Trends','Education','Others'])
            ->default('Others');
            $table->string('featured_image')->nullable();
            // $table->date('published_at');
            $table->date('published_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
