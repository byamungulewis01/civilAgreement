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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('agreement_id');
            $table->foreign('agreement_id')->references('id')->on('agreements')->onDelete('cascade');
            $table->enum('type',['deposit','withdrawal']);// payment type: deposit, withdrawal
            $table->string('amount');
            $table->string('status')->default('pending');// payment status: pending, paid
            $table->string('transactionReference')->nullable();
            $table->timestamps();
        });
        $existingRows = DB::table('payments')->get();
        foreach ($existingRows as $row) {
            DB::table('payments')
                ->where('id', $row->id)
                ->update(['id' => Uuid::uuid4()]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
