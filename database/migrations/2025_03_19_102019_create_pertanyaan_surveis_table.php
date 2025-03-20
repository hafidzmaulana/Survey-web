<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('pertanyaan_surveis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survei_id')->constrained('surveis')->onDelete('cascade'); // FK
            $table->text('teks_pertanyaan');
            $table->enum('tipe_pertanyaan', ['Pilihan Ganda', 'Essay', 'Rating']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('pertanyaan_surveis');
    }
};

