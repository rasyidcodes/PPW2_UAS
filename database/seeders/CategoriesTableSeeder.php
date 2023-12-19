<?php

namespace Database\Seeders;

// database/seeders/CategoriesTableSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can customize the categories data as needed
        $categories = [
            ['name' => 'Fiction'],
            ['name' => 'Non-Fiction'],
            // Add more categories as needed
        ];

        // Insert the data into the 'categories' table
        DB::table('categories')->insert($categories);
    }
}

