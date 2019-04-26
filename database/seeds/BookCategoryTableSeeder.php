<?php

use Illuminate\Database\Seeder;
use App\BookCategory;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookCategory::create(['name' => 'General']);
        BookCategory::create(['name' => 'Red Spot/Reserves']);
    }
}
