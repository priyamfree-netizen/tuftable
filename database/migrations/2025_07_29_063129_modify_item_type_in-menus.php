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
         Schema::table('menu_items', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                if (\DB::getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE menu_items MODIFY COLUMN type ENUM('veg', 'non-veg', 'egg', 'drink', 'other', 'halal')");
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE menu_items DROP CONSTRAINT IF EXISTS menu_items_type_check");
            }
            } else {
                $table->string('type', 100)->default('other')->change();
            }
         
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('menu_items', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                if (\DB::getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE menu_items MODIFY COLUMN type ENUM('veg', 'non-veg', 'egg', 'drink', 'other', 'halal') NOT NULL");
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE menu_items DROP CONSTRAINT IF EXISTS menu_items_type_check");
            }
            } else {
                // Changing enum in pgsql is hard, so we just use string for up and down migrations
                $table->string('type', 100)->default('other')->change();
            }
         
		});
    }

};
