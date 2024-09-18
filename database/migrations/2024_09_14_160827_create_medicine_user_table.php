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
        Schema::create('medicine_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('medicine_id')->references('id')->on('medicines')->constrained()->onDelete('cascade');
            $table->integer('amount');
            $table->string('user_name');
            $table->string("medicine_name");
            $table->integer('total_price');
            $table->integer('send')->default(0);
            $table->integer('receive')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_user');
    }
};
