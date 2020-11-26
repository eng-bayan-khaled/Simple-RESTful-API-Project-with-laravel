<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		 // Query Builder approach
		$this->call(UsersTableSeeder​::class);
		$this->call(AuthersTableSeeder​::class);
		$this->call(ArticlesTableSeeder​::class);
		$this->call(CommentsTableSeeder​::class);
		$this->call(KeywordsTableSeeder​::class);

		
		$data = array();
		for ($x = 0; $x <= 9; $x++) {
		  array_push($data, ['article_id'=>$x+1, 'keyword_id'=> $x+1]);
		}
		DB::table('article_keyword')->insert($data);

    }
}
