<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('NIP')->primary();
            $table->string('Nama');
            $table->string('TempatLahir');
            $table->date('TglLahir');
            $table->enum('JenisKelamin', ['L', 'P']);
            $table->text('Alamat');

            $table->unsignedBigInteger('AgamaID');
            $table->foreign('AgamaID')->references('AgamaID')->on('agama')->onDelete('restrict');

            $table->string('NoHP')->nullable();
            $table->string('NPWP')->nullable();
            $table->string('Foto')->nullable();

            $table->unsignedBigInteger('JabatanID');
            $table->foreign('JabatanID')->references('JabatanID')->on('jabatan')->onDelete('restrict');

            $table->unsignedBigInteger('UnitKerjaID');
            $table->foreign('UnitKerjaID')->references('UnitKerjaID')->on('unit_kerja')->onDelete('restrict');

            $table->unsignedBigInteger('GolID')->nullable();
            $table->foreign('GolID')->references('GolID')->on('golongan')->onDelete('restrict');

            $table->unsignedBigInteger('EselonID')->nullable();
            $table->foreign('EselonID')->references('EselonID')->on('eselon')->onDelete('restrict');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
