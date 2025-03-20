<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('survei_responden', function (Blueprint $table) {
            $table->foreignId('survei_id')->constrained('surveis')->onDelete('cascade'); // FK
            $table->foreignId('responden_id')->constrained('responden')->onDelete('cascade'); // FK
            $table->timestamp('tanggal_mengisi')->useCurrent();
            $table->primary(['survei_id', 'responden_id']); // Composite PK
        });
    }

    public function down() {
        Schema::dropIfExists('survei_responden');
    }
};

