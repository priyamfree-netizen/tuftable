<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\RestaurantPayment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CountrySeeder::class);
        $this->call(GlobalCurrencySeeder::class);
        $this->call(GlobalSettingSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(PackageSeeder::class);

        $this->call(PermissionSeeder::class);
        $this->call(SuperadminSeeder::class);
        $this->call(LanguageSettingSeeder::class);
        // $this->call(RestaurantSettingSeeder::class);
        $this->call(FrontDetailSeeder::class);
        $this->call(EmailSettingSeeder::class);
        $this->call(SuperadminPaymentGatewaySeeder::class);
        $this->call(PusherSettinSeeder::class);
    }
}
