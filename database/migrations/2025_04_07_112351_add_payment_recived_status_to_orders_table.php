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
        Schema::table('orders', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('status', [
                'draft', 'kot', 'billed', 'paid', 'canceled', 'payment_due', 'ready', 'out_for_delivery', 'delivered', 'pending_verification',
            ])->default('kot')->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE orders DROP CONSTRAINT IF EXISTS orders_status_check");
                $table->string('status')->default('kot')->change();
            }
        
		});

    Schema::table('payments', function (Blueprint $table) {
        if (\DB::getDriverName() === 'mysql') {
                $table->enum('payment_method', ['cash', 'upi', 'card', 'due', 'stripe', 'razorpay', 'others'])->default('cash')->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE payments DROP CONSTRAINT IF EXISTS payments_payment_method_check");
                $table->string('payment_method')->default('cash')->change();
            }
    
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('status', [
                'draft', 'kot', 'billed', 'paid', 'canceled', 'payment_due', 'ready', 'out_for_delivery', 'delivered',
            ])->default('kot')->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE orders DROP CONSTRAINT IF EXISTS orders_status_check");
                $table->string('status')->default('kot')->change();
            }
        
		});

        Schema::table('payments', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('payment_method', ['cash', 'upi', 'card', 'due', 'stripe', 'razorpay'])->default('cash')->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE payments DROP CONSTRAINT IF EXISTS payments_payment_method_check");
                $table->string('payment_method')->default('cash')->change();
            }
        
		});
    }
};
