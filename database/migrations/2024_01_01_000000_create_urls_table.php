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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();

            // Nullable because we allow guests to shorten URLs too.
            // If a user is logged in, we store their id here.
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('original_url', 2048);

            // unique() creates a database-level constraint so two rows
            // can NEVER end up with the same short_code, even under
            // race conditions.
            $table->string('short_code', 10)->unique();

            $table->unsignedBigInteger('clicks')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
