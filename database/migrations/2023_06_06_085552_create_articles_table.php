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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->text('header')->nullable(false);
            $table->mediumText('body')->nullable(false);
            $table->boolean('policy');
            $table->boolean('economy');
            $table->boolean('science');
            $table->boolean('technologies');
            $table->boolean('sport');
            $table->boolean('other');
            $table->boolean('world');
            $table->boolean('local');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
