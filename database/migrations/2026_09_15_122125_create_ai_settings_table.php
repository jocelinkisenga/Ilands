<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('primary_model_id')
                ->nullable()
                ->constrained('ai_models')
                ->nullOnDelete();

            /*
             * IDs des modèles fallback dans l'ordre.
             *
             * Exemple :
             * [5, 8, 12]
             */
            $table->json('fallback_model_ids')->nullable();

            $table->boolean('fallback_enabled')->default(true);

            $table->boolean('automatic_failover')->default(true);

            $table->unsignedTinyInteger('max_retries')->default(2);

            $table->unsignedInteger('health_cooldown_seconds')->default(300);

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_settings');
    }
};