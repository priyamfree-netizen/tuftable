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
          Schema::table('menu_items', function (Blueprint $table) {
              // Modify the 'type' column to include additional options
              if (\DB::getDriverName() === 'mysql') {
                  $table->enum('type', ['veg', 'non-veg', 'egg', 'drink', 'other'])->default('veg')->change();
              } else {
                  \DB::statement("ALTER TABLE menu_items DROP CONSTRAINT IF EXISTS menu_items_type_check");
                  $table->string('type')->default('veg')->change();
              }
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            // Revert the 'type' column back to its original definition
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('type', ['veg', 'non-veg', 'egg'])->default('veg')->change();
            } else {
                \DB::statement("ALTER TABLE menu_items DROP CONSTRAINT IF EXISTS menu_items_type_check");
                $table->string('type')->default('veg')->change();
            }
        });
    }

};
