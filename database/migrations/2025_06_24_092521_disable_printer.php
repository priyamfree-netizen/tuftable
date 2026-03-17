<?php

use App\Models\Printer;
use App\Models\Restaurant;
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
        // Only update if the column exists (may not exist in fresh installs)
        if (Schema::hasColumn('printers', 'restaurant_id') && Schema::hasColumn('printers', 'printing_choice')) {
            Printer::where('restaurant_id', '>', 0)
                ->update(['printing_choice' => 'browserPopupPrint']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('printers', 'restaurant_id') && Schema::hasColumn('printers', 'printing_choice')) {
            Printer::where('restaurant_id', '>', 0)
                ->update(['printing_choice' => 'directPrint']);
        }
    }
};
