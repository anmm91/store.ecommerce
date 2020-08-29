<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use App\Models\SettingTranslation;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);


    // ... Some Truncate Query
    Schema::disableForeignKeyConstraints();

        Setting::truncate();
        SettingTranslation::truncate();

        Schema::enableForeignKeyConstraints();

        $this->call(SettingDatabaseSeeder::class);
    }
}
