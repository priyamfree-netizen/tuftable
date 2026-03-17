<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if restaurant_id column exists, if not add it
        if (!Schema::hasColumn('branch_operational_shifts', 'restaurant_id')) {
            Schema::table('branch_operational_shifts', function (Blueprint $table) {
                // Add restaurant_id column as nullable first
                $table->unsignedBigInteger('restaurant_id')->nullable()->after('branch_id');
            
		});
        }

        // FIRST: Update NULL values to a temporary valid enum value (Monday) so we can modify the enum
        DB::table('branch_operational_shifts')
            ->whereNull('day_of_week')
            ->update(['day_of_week' => 'Monday']);

        // NOW: Update enum to include 'All' and make it NOT NULL
        if (\DB::getDriverName() === 'mysql') {
            if (\DB::getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE branch_operational_shifts MODIFY COLUMN day_of_week ENUM('All', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL DEFAULT 'All'");
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE branch_operational_shifts DROP CONSTRAINT IF EXISTS branch_operational_shifts_day_of_week_check");
            }
        } else {
            Schema::table('branch_operational_shifts', function (Blueprint $table) {
                $table->string('day_of_week', 20)->default('All')->change();
            
		});
        }

        // Populate restaurant_id from branch BEFORE adding foreign key
        // First, delete any shifts with invalid branch_id
        DB::table('branch_operational_shifts')
            ->whereNotIn('branch_id', function ($query) {
                $query->select('id')->from('branches');
            })->delete();
        
        // Now populate restaurant_id - update ALL rows to ensure they have correct restaurant_id
        $branches = DB::table('branches')->select('id', 'restaurant_id')->get();
        foreach($branches as $b) {
            DB::table('branch_operational_shifts')
              ->where('branch_id', $b->id)
              ->where(function($q) {
                  $q->whereNull('restaurant_id')->orWhere('restaurant_id', 0);
              })
              ->update(['restaurant_id' => $b->restaurant_id]);
        }
        
        // Delete any rows that still have invalid restaurant_id
        DB::table('branch_operational_shifts')
            ->whereNotNull('restaurant_id')
            ->whereNotIn('restaurant_id', function ($query) {
                $query->select('id')->from('restaurants');
            })->delete();
        
        // Set any remaining NULL restaurant_id to a valid restaurant (if any exist)
        $firstRestaurant = DB::table('restaurants')->first();
        if ($firstRestaurant) {
            DB::table('branch_operational_shifts')
                ->whereNull('restaurant_id')
                ->orWhere('restaurant_id', 0)
                ->update(['restaurant_id' => $firstRestaurant->id]);
        }

        // Check if foreign key exists, if not add it
        $driver = \DB::getDriverName();
        $hasConstraint = false;
        if ($driver === 'mysql') {
            $foreignKeys = DB::select("SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'branch_operational_shifts' AND CONSTRAINT_NAME = 'branch_operational_shifts_restaurant_id_foreign'");
            $hasConstraint = !empty($foreignKeys);
        } elseif ($driver === 'pgsql') {
            $foreignKeys = DB::select("SELECT constraint_name FROM information_schema.table_constraints WHERE table_catalog = current_database() AND table_name = 'branch_operational_shifts' AND constraint_name = 'branch_operational_shifts_restaurant_id_foreign'");
            $hasConstraint = !empty($foreignKeys);
        }

        if (!$hasConstraint) {
            Schema::table('branch_operational_shifts', function (Blueprint $table) {
                $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade')->onUpdate('cascade');
            
		});
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branch_operational_shifts', function (Blueprint $table) {
            // Revert day_of_week to nullable enum without 'All'
            if (\DB::getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE branch_operational_shifts MODIFY COLUMN day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NULL");
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE branch_operational_shifts DROP CONSTRAINT IF EXISTS branch_operational_shifts_day_of_week_check");
            }
            
            // Update 'All' values back to NULL
            DB::table('branch_operational_shifts')
                ->where('day_of_week', 'All')
                ->update(['day_of_week' => null]);
            
            // Drop restaurant_id foreign key and column
            $table->dropForeign(['restaurant_id']);
            $table->dropColumn('restaurant_id');
        
		});
    }
};
