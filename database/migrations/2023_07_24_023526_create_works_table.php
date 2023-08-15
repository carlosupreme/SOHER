<?php

use App\Work\Domain\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('title', 70);
            $table->string('location');
            $table->text('description');
            $table->text('skills');
            $table->integer('initial_budget')->nullable();
            $table->integer('final_budget')->nullable();
            $table->date('deadline')->nullable();
            $table->enum('status',array_column(Status::cases(), 'value'));
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
