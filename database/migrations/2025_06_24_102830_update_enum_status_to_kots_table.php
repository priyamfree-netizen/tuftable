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
        Schema::table('kots', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('status', ['pending_confirmation', 'in_kitchen', 'food_ready', 'served', 'cancelled'])->default('in_kitchen')->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE kots DROP CONSTRAINT IF EXISTS kots_status_check");
                $table->string('status')->default('in_kitchen')->change();
            }
        
		});
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kots', function (Blueprint $table) {
            //
        
		});
    }
};
