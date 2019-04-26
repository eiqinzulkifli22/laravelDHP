<?php

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
        $this->call(UserTableSeeder::class);
        $this->call(BookStatusTableSeeder::class);
        $this->call(BookCategoryTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(BookCopyTableSeeder::class);
        $this->call(BookHoldTableSeeder::class);
    }
}
