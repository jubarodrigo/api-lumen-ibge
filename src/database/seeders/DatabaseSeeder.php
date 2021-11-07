<?php

namespace Database\Seeders;

use App\Models\Ufs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UfsSeeder::class);

    }
}
