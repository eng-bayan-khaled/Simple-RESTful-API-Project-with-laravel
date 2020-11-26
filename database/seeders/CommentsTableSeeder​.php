<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comments;


class CommentsTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comments::factory()->count(10)->create();
    }
}
