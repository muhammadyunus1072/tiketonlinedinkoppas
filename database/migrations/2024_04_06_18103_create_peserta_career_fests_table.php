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
        Schema::create('peserta_career_fests', function (Blueprint $table) {
            $table->id();
            $table->string('timestamp')->nullable();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('status')->default('REGISTERED');
            $table->dateTime('scanned_at')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_career_fests');
    }
};
