<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eselon', function (Blueprint $table) {
            $table->id('EselonID');
            $table->string('NamaEselon');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eselon');
    }
};
