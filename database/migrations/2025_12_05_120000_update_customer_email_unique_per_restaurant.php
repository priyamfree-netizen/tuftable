<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Changes email unique constraint from global to per-restaurant.
     * Same email can now exist in different restaurants.
     */
    public function up(): void
    {
        // Drop the global unique constraint on email if it exists
        if ($this->indexExists('customers', 'customers_email_unique')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropUnique(['email']);
            
		});
        }

        // Add composite unique index for email + restaurant_id
        if (!$this->indexExists('customers', 'customers_email_restaurant_unique')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->unique(['email', 'restaurant_id'], 'customers_email_restaurant_unique');
            
		});
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop composite unique constraint
        if ($this->indexExists('customers', 'customers_email_restaurant_unique')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropUnique('customers_email_restaurant_unique');
            
		});
        }

        // Restore global unique constraint on email
        if (!$this->indexExists('customers', 'customers_email_unique')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->unique('email');
            
		});
        }
    }

    private function indexExists(string $table, string $index): bool
    {
        $result = \Illuminate\Support\Facades\DB::selectOne(
            "SELECT COUNT(*) as count FROM pg_indexes WHERE tablename = ? AND indexname = ?",
            [$table, $index]
        );

        return $result->count > 0;
    }
};

