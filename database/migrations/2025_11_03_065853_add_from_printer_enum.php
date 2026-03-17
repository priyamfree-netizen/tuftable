<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LanguageSetting;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('print_jobs', function (Blueprint $table) {
            if (\DB::getDriverName() === 'mysql') {
                $table->enum('status', ['done', 'failed', 'printing', 'pending'])->default('pending')->nullable()->change();
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE print_jobs DROP CONSTRAINT IF EXISTS print_jobs_status_check");
                $table->string('status')->default('pending')->nullable()->change();
            }
        
		});


        if (Schema::hasColumn('printers', 'ipv4_address')) {
            Schema::table('printers', function (Blueprint $table) {
                $table->dropColumn('ipv4_address');
                $table->dropColumn('thermal_or_nonthermal');
                $table->dropColumn('profile');
                $table->dropColumn('char_per_line');
                $table->dropColumn('ip_address');
                $table->dropColumn('port');
                $table->dropColumn('path');
            
		});
        }
    }
};
