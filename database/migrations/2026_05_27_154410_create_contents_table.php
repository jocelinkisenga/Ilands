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
        Schema::create('contents', function (Blueprint $table) {
    $table->id();

    $table->string('title');
    $table->string('slug')->unique();

    $table->string('type');
    // video | blog | document | pack

    $table->string('thumbnail')->nullable();

    $table->longText('excerpt')->nullable();
    $table->longText('content')->nullable();

    $table->string('video_url')->nullable();
    $table->string('document_path')->nullable();

    $table->string('access_level')->default('free');
    // free | pro | premium

    $table->string('visibility')->default('public');
    // public | private

    $table->string('status')->default('draft');
    // draft | published | archived

    $table->boolean('featured')->default(false);

    $table->foreignId('category_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->foreignId('created_by')
        ->nullable()
        ->constrained('users')
        ->nullOnDelete();

    $table->timestamp('published_at')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
