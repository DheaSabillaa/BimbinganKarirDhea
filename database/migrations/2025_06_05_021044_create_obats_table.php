<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('nama_obat', 255); // Nama obat
            $table->string('kemasan', 255); // Kemasan obat
            $table->decimal('harga', 10, 2); // Harga (misalnya: 10000.00)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('obats');
    }
}