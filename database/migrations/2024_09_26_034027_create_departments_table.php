<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('name')->unique(); // Nama departemen, harus unik
            $table->text('description')->nullable(); // Deskripsi departemen (nullable)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments'); // Hapus tabel jika rollback
    }
}
