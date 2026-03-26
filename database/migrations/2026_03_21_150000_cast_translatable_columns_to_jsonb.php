<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Only needed on PostgreSQL — MySQL stores JSON as text natively
        if (config('database.default') !== 'pgsql') {
            return;
        }

        // Cast item_categories.category_name from text to jsonb
        DB::statement("ALTER TABLE item_categories ALTER COLUMN category_name TYPE jsonb USING category_name::jsonb");

        // Cast menus.menu_name from text to jsonb
        DB::statement("ALTER TABLE menus ALTER COLUMN menu_name TYPE jsonb USING menu_name::jsonb");
    }

    public function down(): void
    {
        if (config('database.default') !== 'pgsql') {
            return;
        }

        DB::statement("ALTER TABLE item_categories ALTER COLUMN category_name TYPE text USING category_name::text");
        DB::statement("ALTER TABLE menus ALTER COLUMN menu_name TYPE text USING menu_name::text");
    }
};
