<?php

// database/migrations/xxxx_xx_xx_create_minumans_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('minumans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('minumans');
    }
};
