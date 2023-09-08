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
        Schema::create('civilians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('phone', 10)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('national_id', 16)->unique();
            $table->string('national_id_image')->nullable();
            $table->string('password');
            $table->enum('status',[1,2,3])->default(1);
            $table->string('password_reset')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('civilians');
    }
};
