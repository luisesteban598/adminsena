<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Guardo la información necesaria para publicar noticias institucionales.
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('summary', 500);
            $table->text('content');
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
