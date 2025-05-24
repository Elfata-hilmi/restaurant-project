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
    Schema::table('merchandises', function (Blueprint $table) {
        $table->dropColumn(['kategori', 'stok']);
        $table->string('image')->nullable()->after('deskripsi');
    });
}

public function down(): void
{
    Schema::table('merchandises', function (Blueprint $table) {
        $table->string('kategori');
        $table->integer('stok');
        $table->dropColumn('image');
    });
}

};
