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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
         $table->foreignId('chat_id')->nullable()->constrained()->cascadeOnDelete();

    $table->text('message');

    $table->enum('role', ['user', 'assistant']);
    $table->string('file_path')->nullable()->after('message');
    $table->string('file_name')->nullable()->after('file_path');
    $table->string('file_type')->nullable()->after('file_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
