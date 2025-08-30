<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->id('UnitKerjaID');
            $table->string('NamaUnitKerja');
            $table->string('TempatTugas');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('UnitKerjaID')->on('unit_kerja')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unit_kerja');
    }
};
