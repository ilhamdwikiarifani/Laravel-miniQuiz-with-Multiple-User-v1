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
        Schema::create('result__exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('benar');
            $table->string('salah');
            $table->string('jumlahSoal');
            $table->string('overall');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result__exams');
    }
};
