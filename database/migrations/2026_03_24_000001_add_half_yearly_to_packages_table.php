<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->boolean('half_yearly_status')->default(false)->after('annual_status');
            $table->decimal('half_yearly_price', 10, 3)->nullable()->after('annual_price');
            $table->string('stripe_half_yearly_plan_id')->nullable()->after('stripe_annual_plan_id');
            $table->string('razorpay_half_yearly_plan_id')->nullable()->after('razorpay_annual_plan_id');
            $table->string('flutterwave_half_yearly_plan_id')->nullable()->after('flutterwave_annual_plan_id');
            $table->string('paystack_half_yearly_plan_id')->nullable()->after('paystack_annual_plan_id');
            $table->string('paddle_half_yearly_price_id')->nullable()->after('paddle_annual_price_id');
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn([
                'half_yearly_status',
                'half_yearly_price',
                'stripe_half_yearly_plan_id',
                'razorpay_half_yearly_plan_id',
                'flutterwave_half_yearly_plan_id',
                'paystack_half_yearly_plan_id',
                'paddle_half_yearly_price_id',
            ]);
        });
    }
};
