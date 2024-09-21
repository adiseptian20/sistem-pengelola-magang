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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->default(1);
            $table->string('username')->unique()->nullable(); 
            $table->string('name')->nullable(); 
            $table->string('npm')->nullable(); 
            $table->text('alamat')->nullable(); 
            $table->string('domisili')->nullable(); 
            $table->string('fakultas')->nullable(); 
            $table->string('jurusan')->nullable(); 
            $table->string('univ')->nullable(); 
            $table->date('tanggal_lahir')->nullable(); 
            $table->string('no_telp')->nullable(); 
            $table->string('email')->unique();
            $table->string('jenjang')->nullable(); 
            $table->year('tahun_masuk')->nullable(); 
            $table->text('soft_skill')->nullable(); 
            $table->text('hard_skill')->nullable(); 
            $table->string('kontak_darurat')->nullable(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};