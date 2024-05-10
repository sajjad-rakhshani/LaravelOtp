<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('laravel_otp_codes', function (Blueprint $table) {
            $table->string('mobile')->unique();
            $table->text('code');
            $table->timestamp('expire');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laravel_otp_codes');
    }

};
