<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToObatTable extends Migration
{
    /**
     * Tambahkan kolom soft delete ke tabel obat.
     */
    public function up()
    {
        Schema::table('obats', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at (nullable timestamp)
        });
    }
    /**
     * Hapus kolom soft delete dari tabel obat.
     */
    public function down()
    {
        Schema::table('obats', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at
        });
    }
}
