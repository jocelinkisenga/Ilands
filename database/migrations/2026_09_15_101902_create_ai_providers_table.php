<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_providers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique()->nullable();

            /*
             * Nom du provider utilisé par Prism.
             *
             * Exemples :
             * gemini
             * anthropic
             * openai
             */
            $table->string('driver')->nullable();

            $table->boolean('is_enabled')->default(true);

            /*
             * healthy
             * limited
             * unavailable
             * unknown
             */
            $table->string('status')->default('unknown');

            $table->timestamp('last_health_check_at')->nullable();

            $table->text('last_error')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(['is_enabled', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_providers');
    }
};