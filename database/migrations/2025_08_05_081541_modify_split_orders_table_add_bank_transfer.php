<?php

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

        Schema::table('split_orders', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('payment_method', ['cash', 'upi', 'card', 'bank_transfer', 'due', 'stripe', 'razorpay'])
                ->default('cash')
                ->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE split_orders DROP CONSTRAINT IF EXISTS split_orders_payment_method_check");
                $table->string('payment_method')
                ->default('cash')
                ->change();
            }
        
		});

    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::table('split_orders', function (Blueprint $table) {
            $table->enum('payment_method', ['cash', 'upi', 'card', 'due', 'stripe', 'razorpay'])->default('cash');
        
		});

    }

};
