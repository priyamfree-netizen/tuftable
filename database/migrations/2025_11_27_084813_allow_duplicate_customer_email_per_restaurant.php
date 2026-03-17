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
        // Check if unique constraint exists before dropping
        $indexExists = $this->indexExists('customers', 'customers_email_unique');

        if ($indexExists) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropUnique(['email']);
            
		});
        }

        // Add composite unique constraint for restaurant_id and email
        // This allows the same email to exist for different restaurants
        $compositeIndexExists = $this->indexExists('customers', 'customers_restaurant_email_unique');
        
        if (!$compositeIndexExists) {
            Schema::table('customers', function (Blueprint $table) {
                $table->unique(['restaurant_id', 'email'], 'customers_restaurant_email_unique');
            
		});
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop composite unique constraint
        $compositeIndexExists = $this->indexExists('customers', 'customers_restaurant_email_unique');
        
        if ($compositeIndexExists) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropUnique('customers_restaurant_email_unique');
            
		});
        }

        // Restore original unique constraint on email
        $indexExists = $this->indexExists('customers', 'customers_email_unique');

        if (!$indexExists) {
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
