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
        Schema::create('leads', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('email')->unique();
        $table->string('primary_income_source');
        $table->string('income_bracket');
        $table->string('tracking_status'); 
        $table->text('tax_concern')->nullable();
        $table->string('recommended_tier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
