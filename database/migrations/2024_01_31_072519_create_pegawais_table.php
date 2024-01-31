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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('gander', ['Pria', 'Wanita']);
            $table->string('agama');
            $table->text('alamat');
            $table->unsignedBigInteger('kelurahan_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('provinsi_id');
            $table->timestamps();

            $table->foreign('kelurahan_id')->references('id')->on('kelurahans')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('provinsi_id')->references('id')->on('provinsis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
