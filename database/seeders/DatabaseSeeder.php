<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // PermessionSeeder::class,
            FileTypeSeeder::class,
            NationalitySeeder::class,
            SectorSeeder::class,
            TitleSeeder::class,
            CountriesSeeder::class,
            CompanySeeder::class,
            AdminSeeder::class,
            ApplicationStatusSeeder::class,
        ]);
    }
}
