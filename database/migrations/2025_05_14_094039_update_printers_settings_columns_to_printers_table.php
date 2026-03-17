<?php

use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('printers', function (Blueprint $table) {
		});
    }

    public function down(): void
    {
        // Revert any inserted printers marked as default (optional)
        DB::table('printers')->where('is_default', true)->delete();

        Schema::table('printers', function (Blueprint $table) {
            // Restore enum types if needed
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('profile', ['default', 'simple', 'SP2000', 'TEP-200M', 'P822D'])->nullable(false)->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE printers DROP CONSTRAINT IF EXISTS printers_profile_check");
                $table->string('profile')->nullable(false)->change();
            }
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('type', ['network', 'windows', 'linux'])->nullable(false)->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE printers DROP CONSTRAINT IF EXISTS printers_type_check");
                $table->string('type')->nullable(false)->change();
            }
            $table->integer('char_per_line')->nullable(false)->change();

            // Drop foreign keys first
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['branch_id']);

            // Then drop columns in reverse order of addition
            $table->dropColumn([
                'share_name',
                'thermal_or_nonthermal',
                'ipv4_address',
                'open_cash_drawer',
                'invoice_qr_code',
                'print_format',
                'orders',
                'kots',
                'printing_choice',
                'is_default',
                'is_active',
                'branch_id',
                'restaurant_id',
            ]);
        
		});
    }

};
