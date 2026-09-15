<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_models', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ai_provider_id')
                ->constrained('ai_providers')
                ->cascadeOnDelete();

            $table->string('name');

            /*
             * Identifiant exact envoyé à Prism.
             *
             * Exemple :
             * gemini-flash-latest
             */
            $table->string('model_identifier')->nullable();

            $table->string('label')->nullable();

            $table->boolean('is_enabled')->default(true);

            /*
             * Plus petit = priorité supérieure.
             */
            $table->unsignedInteger('priority')->default(100);

            $table->unsignedInteger('max_input_tokens')->nullable();
            $table->unsignedInteger('max_output_tokens')->nullable();

            /*
             * Informations tarifaires.
             * Elles ne servent pas directement à appeler Prism.
             */
            $table->decimal('input_price_per_million', 12, 6)->nullable();
            $table->decimal('output_price_per_million', 12, 6)->nullable();

            $table->json('capabilities')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index([
                'ai_provider_id',
                'is_enabled',
                'priority',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_models');
    }
};