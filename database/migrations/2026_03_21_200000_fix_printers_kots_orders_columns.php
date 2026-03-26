<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $driver = DB::getDriverName();

        // Convert kots boolean -> jsonb/json (store array of kot_place IDs)
        if (Schema::hasColumn('printers', 'kots')) {
            if ($driver === 'pgsql') {
                DB::statement('ALTER TABLE printers ALTER COLUMN kots DROP DEFAULT');
                DB::statement('ALTER TABLE printers ALTER COLUMN kots TYPE jsonb USING CASE WHEN kots THEN \'[]\'::jsonb ELSE \'[]\'::jsonb END');
                DB::statement("ALTER TABLE printers ALTER COLUMN kots SET DEFAULT '[]'");
            } else {
                // MySQL: change boolean to json
                DB::statement('ALTER TABLE printers MODIFY kots JSON NULL');
            }
        }

        // Convert orders boolean -> jsonb/json (store array of order_place IDs)
        if (Schema::hasColumn('printers', 'orders')) {
            if ($driver === 'pgsql') {
                DB::statement('ALTER TABLE printers ALTER COLUMN orders DROP DEFAULT');
                DB::statement('ALTER TABLE printers ALTER COLUMN orders TYPE jsonb USING CASE WHEN orders THEN \'[]\'::jsonb ELSE \'[]\'::jsonb END');
                DB::statement("ALTER TABLE printers ALTER COLUMN orders SET DEFAULT '[]'");
            } else {
                DB::statement('ALTER TABLE printers MODIFY orders JSON NULL');
            }
        }

        // Add missing columns if not present
        Schema::table('printers', function (Blueprint $table) {
            if (!Schema::hasColumn('printers', 'characters_per_line')) {
                $table->integer('characters_per_line')->nullable()->after('print_format');
            }
            if (!Schema::hasColumn('printers', 'print_type')) {
                $table->string('print_type')->default('image')->after('print_format');
            }
        });
    }

    public function down(): void
    {
        $driver = DB::getDriverName();

        if ($driver === 'pgsql') {
            DB::statement('ALTER TABLE printers ALTER COLUMN kots TYPE boolean USING false');
            DB::statement('ALTER TABLE printers ALTER COLUMN orders TYPE boolean USING false');
        }

        Schema::table('printers', function (Blueprint $table) {
            if (Schema::hasColumn('printers', 'characters_per_line')) {
                $table->dropColumn('characters_per_line');
            }
            if (Schema::hasColumn('printers', 'print_type')) {
                $table->dropColumn('print_type');
            }
        });
    }
};
