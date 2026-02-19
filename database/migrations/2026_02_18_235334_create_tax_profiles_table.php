<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tax_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('filing_status', ['single','married_joint','married_separeted','head_household'])->default('single');
            $table->double('annual_income',15,2)->default(0.00);
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('town')->nullable();
            $table->integer('depends')->nullable();
            $table->double('business_income',15,2)->default(0.00);
            $table->double('other_income',15,2)->default(0.00);
            $table->boolean('crypto_activity')->default(false);
            $table->json('raw_payload')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_profiles');
    }
};
