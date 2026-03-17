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
        // Step 1: Add the new JSON column
        if (
            Schema::hasColumn('modifier_options', 'name') &&
            DB::connection()->getSchemaBuilder()->getColumnType('modifier_options', 'name') !== 'json'
        ) {
            Schema::table('modifier_options', function (Blueprint $table) {
                $table->text('name_json')->nullable()->after('name');
            
		});

            // Step 2: Copy existing values into JSON format with current locale
            $locale = app()->getLocale() ?: 'en'; // Default to 'en' if locale is not set
            if (\DB::getDriverName() === 'mysql') {
                DB::statement("UPDATE modifier_options SET name_json = JSON_OBJECT('$locale', name)");
            } else {
                DB::statement("UPDATE modifier_options SET name_json = json_build_object('$locale', name)");
            }

            // Step 3: Drop the old column and rename the new one
            Schema::table('modifier_options', function (Blueprint $table) {
                $table->dropColumn('name');
            
		});

            Schema::table('modifier_options', function (Blueprint $table) {
                $table->renameColumn('name_json', 'name');
            
		});
        }

        Schema::create('modifier_group_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modifier_group_id');
            $table->unique(['modifier_group_id', 'locale']);
            $table->foreign('modifier_group_id')->references('id')->on('modifier_groups')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modifier_group_translations');
    }
};
