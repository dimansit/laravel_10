<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 300);
            $table->string('author', 150);
            $table->text('description');
            $table->string('category_id');
            $table->string('source_id');
            $table->integer('user_create_id');
            $table->timestamp('create_at');
            $table->timestamp('updated_at');

            $table->index('source_id');
            $table->index('user_create_id');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
