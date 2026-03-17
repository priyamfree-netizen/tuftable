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
        Schema::table('branch_operational_shifts', function (Blueprint $table) {
            $table->string('day_of_week', 20)->default('All')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branch_operational_shifts', function (Blueprint $table) {
            // If postgresql is used and the column is meant to be enum, it might fail to revert,
            // but for safety we use string instead since going backwards in migration isn't common.
            // Using standard enum change on down migration.
            if (\DB::getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE branch_operational_shifts MODIFY COLUMN day_of_week ENUM('All', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL DEFAULT 'All'");
            } else {
                $table->string('day_of_week', 20)->default('All')->change();
            }
        });
    }
};
