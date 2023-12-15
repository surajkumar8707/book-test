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
            $table->uuid('uid')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('operator_code')->unique();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('order_id')->nullable();
            $table->string('category_uid')->nullable();
            $table->integer('count_scanning')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('otp')->nullable();
            $table->timestamp('otp_expire')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
