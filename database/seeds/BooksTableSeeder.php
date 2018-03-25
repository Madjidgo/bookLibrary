<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            for ($i=0; $i <2 ; $i++) { 
         DB::table('books')->insert([
            'title' => str_random(5),
            'resume' => str_random(20),
            'author' => str_random(5),
            'category' => str_random(10),

        ]);
                    
            }

    
    }
}
