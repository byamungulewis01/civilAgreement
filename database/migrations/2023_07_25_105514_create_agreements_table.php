<?php

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('category');
            $table->text('description');
            $table->string('amount');
            $table->foreignId('partyOne')->constrained('civilians')->onDelete('cascade');
            $table->foreignId('partyTwo')->constrained('civilians')->onDelete('cascade');
            $table->enum('status',['pending','accepted','rejected','completed'])->default('pending');// agreement status: pending, accepted, rejected, completed
            $table->string('acceptedDate')->nullable();
            $table->string('rejectedDate')->nullable();
            $table->string('completedDate')->nullable();
            $table->string('duration');
            $table->enum('whoToPay',['me','other']);// who to pay: me, other
            $table->foreignId('created_by')->constrained('civilians')->onDelete('cascade');
            $table->timestamps();
        });
        $existingRows = DB::table('agreements')->get();
        foreach ($existingRows as $row) {
            DB::table('agreements')
                ->where('id', $row->id)
                ->update(['id' => Uuid::uuid4()]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
    }
};
