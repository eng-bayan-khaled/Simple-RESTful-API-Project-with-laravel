<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Authers;

class AuthersTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Authers::factory()->count(10)->create();

    }
}
