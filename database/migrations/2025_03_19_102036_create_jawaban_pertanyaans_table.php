<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('jawaban_pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanyaan_id')->constrained('pertanyaan_surveis')->onDelete('cascade'); // FK
            $table->foreignId('responden_id')->constrained('responden')->onDelete('cascade'); // FK
            $table->text('jawaban');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('jawaban_pertanyaans');
    }
};

