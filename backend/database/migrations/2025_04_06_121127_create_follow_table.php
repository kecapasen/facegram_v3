<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('follow', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follower_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('following_id')->constrained('user')->onDelete('cascade');
            $table->boolean('is_accepted')->default(false);
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('follow');
    }
};
