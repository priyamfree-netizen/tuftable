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

        Schema::table('payments', function (Blueprint $table) {
            // ['cash', 'upi', 'card', 'due', 'stripe', 'razorpay', 'paypal']
            $table->string('payment_method')->default('cash')->nullable()->change();
        
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('payment_method', ['cash', 'upi', 'card', 'due', 'stripe', 'razorpay', 'paypal'])->default('cash')->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE payments DROP CONSTRAINT IF EXISTS payments_payment_method_check");
                $table->string('payment_method')->default('cash')->change();
            }
        
		});
    }
};
