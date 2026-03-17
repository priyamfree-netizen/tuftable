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
        if (Schema::hasColumn('kot_settings', 'default_status')) {
            Schema::table('kot_settings', function (Blueprint $table) {
                $table->renameColumn('default_status', 'default_status_pos');
            
		});
            Schema::table('kot_settings', function (Blueprint $table) {
                if (\DB::getDriverName() === 'mysql') {
                    if (\DB::getDriverName() === 'mysql') {
                $table->enum('default_status_pos', ['pending', 'cooking'])->default('pending')->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE kot_settings DROP CONSTRAINT IF EXISTS kot_settings_default_status_pos_check");
                $table->string('default_status_pos')->default('pending')->change();
            }
                } else {
                    \DB::statement("ALTER TABLE kot_settings DROP CONSTRAINT IF EXISTS kot_settings_default_status_check");
                    \DB::statement("ALTER TABLE kot_settings DROP CONSTRAINT IF EXISTS kot_settings_default_status_pos_check");
                    $table->string('default_status_pos')->default('pending')->change();
                }
            
		});
        }

        if (!Schema::hasColumn('kot_settings', 'default_status_customer')) {
            Schema::table('kot_settings', function (Blueprint $table) {
		});
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('kot_settings', 'default_status_customer')) {
            Schema::table('kot_settings', function (Blueprint $table) {
                $table->dropColumn('default_status_customer');
            
		});
        }

        if (Schema::hasColumn('kot_settings', 'default_status_pos')) {
            Schema::table('kot_settings', function (Blueprint $table) {
                $table->renameColumn('default_status_pos', 'default_status');
            
		});
        }
    }
};
