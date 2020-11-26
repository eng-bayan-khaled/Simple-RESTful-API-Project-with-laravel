<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keywords;


class KeywordsTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Keywords::factory()->count(10)->create();
    }
}
