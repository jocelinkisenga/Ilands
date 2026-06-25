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
        Schema::create('ai_reports', function (Blueprint $table) {

    $table->id();

    $table->foreignId('user_id');
    $table->foreignId('chat_id');

    $table->string('title');

    $table->text('summary')
        ->nullable();

    $table->longText('content')
        ->nullable();

    $table->string('type')
        ->default('general');

    $table->string('status')
        ->default('completed');

    $table->string('source_file')
        ->nullable();

    $table->string('pdf_path')
        ->nullable();

    $table->string('model')
        ->nullable();

    $table->integer('confidence_score')
        ->nullable();

    $table->json('meta')
        ->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_reports');
    }
};
