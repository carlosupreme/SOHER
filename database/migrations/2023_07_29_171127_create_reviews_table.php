<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id')->nullable();
            $table->unsignedBigInteger('to_user_id')->nullable();
            $table->decimal('rating', 1, 0, true); // 1 - 5
            $table->string('title', 70)->nullable();
            $table->text('review')->nullable();
            $table->timestamps();
            $table->foreign('from_user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('to_user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
