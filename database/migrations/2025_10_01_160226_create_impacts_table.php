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
        Schema::create('impacts', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description');
                $table->string('impact_type'); // 'article', 'video', 'case-study', etc.
                $table->enum('content_type', ['article', 'video', 'external'])->default('article');
                $table->string('image')->nullable();
                $table->string('video_url')->nullable(); // For YouTube/Vimeo links
                $table->string('external_link')->nullable();
                $table->text('content')->nullable(); // Full article content
                $table->date('date')->nullable();
                $table->boolean('is_published')->default(true);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impacts');
    }
};
